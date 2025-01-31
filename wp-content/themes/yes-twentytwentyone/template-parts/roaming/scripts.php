<script type="text/javascript">
    /**
     * LiquidMetal, version: 1.2.1 (2012-04-21)
     *
     * A mimetic poly-alloy of Quicksilver's scoring algorithm, essentially
     * LiquidMetal.
     *
     * For usage and examples, visit:
     * http://github.com/rmm5t/liquidmetal
     *
     * Licensed under the MIT:
     * http://www.opensource.org/licenses/mit-license.php
     *
     * Copyright (c) 2009-2012, Ryan McGeary (ryan -[at]- mcgeary [*dot*] org)
     */
    var LiquidMetal = (function() {
        var SCORE_NO_MATCH = 0.0;
        var SCORE_MATCH = 1.0;
        var SCORE_TRAILING = 0.8;
        var SCORE_TRAILING_BUT_STARTED = 0.9;
        var SCORE_BUFFER = 0.85;
        var WORD_SEPARATORS = " \t_-";

        return {
            lastScore: null,
            lastScoreArray: null,

            score: function(string, abbrev) {
                // short circuits
                if (abbrev.length === 0) return SCORE_TRAILING;
                if (abbrev.length > string.length) return SCORE_NO_MATCH;

                // match & score all
                var allScores = [];
                var search = string.toLowerCase();
                abbrev = abbrev.toLowerCase();
                this._scoreAll(string, search, abbrev, -1, 0, [], allScores);

                // complete miss
                if (allScores.length == 0) return 0;

                // sum per-character scores into overall scores,
                // selecting the maximum score
                var maxScore = 0.0,
                    maxArray = [];
                for (var i = 0; i < allScores.length; i++) {
                    var scores = allScores[i];
                    var scoreSum = 0.0;
                    for (var j = 0; j < string.length; j++) {
                        scoreSum += scores[j];
                    }
                    if (scoreSum > maxScore) {
                        maxScore = scoreSum;
                        maxArray = scores;
                    }
                }

                // normalize max score by string length
                // s. t. the perfect match score = 1
                maxScore /= string.length;

                // record maximum score & score array, return
                this.lastScore = maxScore;
                this.lastScoreArray = maxArray;
                return maxScore;
            },

            _scoreAll: function(string, search, abbrev, searchIndex, abbrIndex, scores, allScores) {
                // save completed match scores at end of search
                if (abbrIndex == abbrev.length) {
                    // add trailing score for the remainder of the match
                    var started = (search.charAt(0) == abbrev.charAt(0));
                    var trailScore = started ? SCORE_TRAILING_BUT_STARTED : SCORE_TRAILING;
                    fillArray(scores, trailScore, scores.length, string.length);
                    // save score clone (since reference is persisted in scores)
                    allScores.push(scores.slice(0));
                    return;
                }

                // consume current char to match
                var c = abbrev.charAt(abbrIndex);
                abbrIndex++;

                // cancel match if a character is missing
                var index = search.indexOf(c, searchIndex);
                if (index == -1) return;

                // match all instances of the abbreviaton char
                var scoreIndex = searchIndex; // score section to update
                while ((index = search.indexOf(c, searchIndex + 1)) != -1) {
                    // score this match according to context
                    if (isNewWord(string, index)) {
                        scores[index - 1] = 1;
                        fillArray(scores, SCORE_BUFFER, scoreIndex + 1, index - 1);
                    } else if (isUpperCase(string, index)) {
                        fillArray(scores, SCORE_BUFFER, scoreIndex + 1, index);
                    } else {
                        fillArray(scores, SCORE_NO_MATCH, scoreIndex + 1, index);
                    }
                    scores[index] = SCORE_MATCH;

                    // consume matched string and continue search
                    searchIndex = index;
                    this._scoreAll(string, search, abbrev, searchIndex, abbrIndex, scores, allScores);
                }
            }
        };

        function isUpperCase(string, index) {
            var c = string.charAt(index);
            return ("A" <= c && c <= "Z");
        }

        function isNewWord(string, index) {
            var c = string.charAt(index - 1);
            return (WORD_SEPARATORS.indexOf(c) != -1);
        }

        function fillArray(array, value, from, to) {
            for (var i = from; i < to; i++) {
                array[i] = value;
            }
            return array;
        }
    })();

    /**
     * flexselect: a jQuery plugin, version: 0.9.0 (2016-09-16)
     * @requires jQuery v1.3 or later
     *
     * FlexSelect is a jQuery plugin that makes it easy to convert a select box into
     * a Quicksilver-style, autocompleting, flex matching selection tool.
     *
     * For usage and examples, visit:
     * http://rmm5t.github.io/jquery-flexselect/
     *
     * Licensed under the MIT:
     * http://www.opensource.org/licenses/mit-license.php
     *
     * Copyright (c) 2009-2015, Ryan McGeary (ryan -[at]- mcgeary [*dot*] org)
     */
    (function($) {
        $.flexselect = function(select, options) {
            this.init(select, options);
        };

        $.extend($.flexselect.prototype, {
            settings: {
                allowMismatch: false,
                allowMismatchBlank: true, // If "true" a user can backspace such that the value is nothing (even if no blank value was provided in the original criteria)
                sortBy: 'score', // 'score' || 'name'
                blankSortBy: 'initial', // 'score' || 'name' || 'initial'
                preSelection: true,
                hideDropdownOnEmptyInput: false,
                selectedClass: "flexselect_selected",
                dropdownClass: "flexselect_dropdown",
                showDisabledOptions: false,
                inputIdTransform: function(id) {
                    return id + "_flexselect";
                },
                inputNameTransform: function(name) {
                    return;
                },
                dropdownIdTransform: function(id) {
                    return id + "_flexselect_dropdown";
                },
                onSelected: false
            },
            select: null,
            input: null,
            dropdown: null,
            dropdownList: null,
            cache: [],
            results: [],
            lastAbbreviation: null,
            abbreviationBeforeFocus: null,
            selectedIndex: 0,
            picked: false,
            allowMouseMove: true,
            dropdownMouseover: false, // Workaround for poor IE behaviors
            indexOptgroupLabels: false,

            init: function(select, options) {
                this.settings = $.extend({}, this.settings, options);
                this.select = $(select);
                this.reloadCache();
                this.renderControls();
                this.wire();
            },

            reloadCache: function() {
                var name, group, text, disabled;
                var indexGroup = this.settings.indexOptgroupLabels;
                this.cache = this.select.find("option").map(function() {
                    name = $(this).text();
                    group = $(this).parent("optgroup").attr("label");
                    text = indexGroup ? [name, group].join(" ") : name;
                    disabled = $(this).parent("optgroup").attr("disabled") || $(this).attr('disabled');
                    return {
                        text: $.trim(text),
                        name: $.trim(name),
                        value: $(this).val(),
                        disabled: disabled,
                        score: 0.0
                    };
                });
            },

            renderControls: function() {
                var selected = this.settings.preSelection ? this.select.find("option:selected") : null;

                this.input = $("<input type='text' autocomplete='off' />").attr({
                    id: this.settings.inputIdTransform(this.select.attr("id")),
                    name: this.settings.inputNameTransform(this.select.attr("name")),
                    accesskey: this.select.attr("accesskey"),
                    tabindex: this.select.attr("tabindex"),
                    style: this.select.attr("style"),
                    placeholder: this.select.attr("data-placeholder")
                }).addClass(this.select.attr("class")).val($.trim(selected ? selected.text() : '')).css({
                    visibility: 'visible'
                });

                this.dropdown = $("<div></div>").attr({
                    id: this.settings.dropdownIdTransform(this.select.attr("id"))
                }).addClass(this.settings.dropdownClass);
                this.dropdownList = $("<ul></ul>");
                this.dropdown.append(this.dropdownList);

                this.select.after(this.input).hide();
                $("body").append(this.dropdown);
            },

            wire: function() {
                var self = this;

                this.input.click(function() {
                    self.lastAbbreviation = null;
                    self.focus();
                });

                this.input.mouseup(function(event) {
                    // This is so Safari selection actually occurs.
                    event.preventDefault();
                });

                this.input.focus(function() {
                    self.abbreviationBeforeFocus = self.input.val();
                    self.input[0].setSelectionRange(0, self.input.val().length);
                    if (!self.picked) self.filterResults();
                });

                this.input.blur(function() {
                    if (!self.dropdownMouseover) {
                        self.hide();
                        if (self.settings.allowMismatchBlank && $.trim($(this).val()) == '')
                            self.setValue('');
                        else if (!self.settings.allowMismatch && !self.picked)
                            self.reset();
                    }
                });

                this.dropdownList.mouseover(function(event) {
                    if (!self.allowMouseMove) {
                        self.allowMouseMove = true;
                        return;
                    }

                    if (event.target.tagName == "LI") {
                        var rows = self.dropdown.find("li");
                        self.markSelected(rows.index($(event.target)));
                    }
                });
                this.dropdownList.mouseleave(function() {
                    self.markSelected(-1);
                });
                this.dropdownList.mouseup(function(event) {
                    self.pickSelected();
                    self.focusAndHide();
                });
                this.dropdownList.bind("touchstart", function(event) {
                    if (event.target.tagName == "LI") {
                        var rows = self.dropdown.find("li");
                        self.markSelected(rows.index($(event.target)));
                    }
                });
                this.dropdown.mouseover(function(event) {
                    self.dropdownMouseover = true;
                });
                this.dropdown.mouseleave(function(event) {
                    self.dropdownMouseover = false;
                });
                this.dropdown.mousedown(function(event) {
                    event.preventDefault();
                });

                this.input.keyup(function(event) {
                    switch (event.keyCode) {
                        case 13: // return
                            event.preventDefault();
                            self.pickSelected();
                            self.focusAndHide();
                            break;
                        case 27: // esc
                            event.preventDefault();
                            self.reset();
                            self.focusAndHide();
                            break;
                        default:
                            self.filterResults();
                            break;
                    }
                });

                this.input.keydown(function(event) {
                    switch (event.keyCode) {
                        case 9: // tab
                            self.pickSelected();
                            self.hide();
                            break;
                        case 33: // pgup
                            event.preventDefault();
                            self.markFirst();
                            break;
                        case 34: // pgedown
                            event.preventDefault();
                            self.markLast();
                            break;
                        case 38: // up
                            event.preventDefault();
                            self.moveSelected(-1);
                            break;
                        case 40: // down
                            event.preventDefault();
                            self.moveSelected(1);
                            break;
                        case 13: // return
                        case 27: // esc
                            event.preventDefault();
                            event.stopPropagation();
                            break;
                    }
                });

                var input = this.input;
                this.select.change(function() {
                    input.val($.trim($(this).find('option:selected').text()));
                });
            },

            filterResults: function() {
                var showDisabled = this.settings.showDisabledOptions;
                var abbreviation = $.trim(this.input.val());
                var sortByMechanism = (abbreviation == "") ? this.settings.blankSortBy : this.settings.sortBy;
                if (abbreviation == this.lastAbbreviation) return;

                var results = [];
                $.each(this.cache, function() {
                    if (this.disabled && !showDisabled) return;
                    this.score = LiquidMetal.score(this.text, abbreviation);
                    if (this.score > 0.0) results.push(this);
                });
                this.results = results;

                this.sortResultsBy(sortByMechanism);
                this.renderDropdown();
                this.markFirst();
                this.lastAbbreviation = abbreviation;
                this.picked = false;
                this.allowMouseMove = false;

                if (this.settings.hideDropdownOnEmptyInput) {
                    if (abbreviation == "")
                        this.dropdown.hide();
                    else
                        this.dropdown.show();
                }
            },

            sortResultsBy: function(mechanism) {
                if (mechanism == "score") {
                    this.sortResultsByScore();
                } else if (mechanism == "name") {
                    this.sortResultsByName();
                }
            },

            sortResultsByScore: function() {
                this.results.sort(function(a, b) {
                    return b.score - a.score;
                });
            },

            sortResultsByName: function() {
                this.results.sort(function(a, b) {
                    return a.name < b.name ? -1 : (a.name > b.name ? 1 : 0);
                });
            },

            renderDropdown: function() {
                var showDisabled = this.settings.showDisabledOptions;
                var dropdownBorderWidth = this.dropdown.outerWidth() - this.dropdown.innerWidth();
                var inputOffset = this.input.offset();
                this.dropdown.css({
                    width: (this.input.outerWidth() - dropdownBorderWidth) + "px",
                    top: (inputOffset.top + this.input.outerHeight()) + "px",
                    left: inputOffset.left + "px",
                    maxHeight: ''
                });

                var html = '';
                var disabledAttribute = '';
                $.each(this.results, function() {
                    if (this.disabled && !showDisabled) return;
                    disabledAttribute = this.disabled ? ' class="disabled"' : '';
                    html += '<li' + disabledAttribute + '>' + this.name + '</li>';
                });
                this.dropdownList.html(html);
                this.adjustMaxHeight();
                this.dropdown.show();
            },

            adjustMaxHeight: function() {
                var maxTop = $(window).height() + $(window).scrollTop() - this.dropdown.outerHeight();
                var top = parseInt(this.dropdown.css('top'), 10);
                this.dropdown.css('max-height', top > maxTop ? (Math.max(0, maxTop - top + this.dropdown.innerHeight()) + 'px') : '');
            },

            markSelected: function(n) {
                if (n < 0 || n >= this.results.length) return;

                var rows = this.dropdown.find("li");
                rows.removeClass(this.settings.selectedClass);

                var row = $(rows[n]);
                if (row.hasClass('disabled')) {
                    this.selectedIndex = null;
                    return;
                }

                this.selectedIndex = n;
                row.addClass(this.settings.selectedClass);
                var top = row.position().top;
                var delta = top + row.outerHeight() - this.dropdown.height();
                if (delta > 0) {
                    this.allowMouseMove = false;
                    this.dropdown.scrollTop(this.dropdown.scrollTop() + delta);
                } else if (top < 0) {
                    this.allowMouseMove = false;
                    this.dropdown.scrollTop(Math.max(0, this.dropdown.scrollTop() + top));
                }
            },

            pickSelected: function() {
                var selected = this.results[this.selectedIndex];
                if (selected && !selected.disabled) {
                    this.input.val(selected.name);
                    this.setValue(selected.value);
                    this.picked = true;
                    if (this.settings.onSelected) {
                        this.settings.onSelected(selected.value, selected.name);
                    }
                } else if (this.settings.allowMismatch) {
                    this.setValue.val("");
                } else {
                    this.reset();
                }
            },

            setValue: function(val) {
                if (this.select.val() === val) return;
                this.select.val(val).change();
            },

            hide: function() {
                this.dropdown.hide();
                this.lastAbbreviation = null;
            },

            moveSelected: function(n) {
                this.markSelected(this.selectedIndex + n);
            },
            markFirst: function() {
                this.markSelected(0);
            },
            markLast: function() {
                this.markSelected(this.results.length - 1);
            },
            reset: function() {
                this.input.val(this.abbreviationBeforeFocus);
            },
            focus: function() {
                this.input.focus();
            },
            focusAndHide: function() {
                //this.focus();
                this.hide();
            }
        });

        $.fn.flexselect = function(options) {
            this.each(function() {
                if ($(this).data("flexselect")) {
                    $(this).data("flexselect").reloadCache();
                } else if (this.tagName == "SELECT") {
                    $(this).data("flexselect", new $.flexselect(this, options));
                }
            });
            return this;
        };
    })(jQuery);


    $(document).ready(function() {
        $('.carousel-roaming').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 3000,
            dots: true,
            arrows: false,
        });

        $(".dropdown-item").click(function() {
            var $parent = $(this).parents(".dropdown");
            var $input = $("input[type=hidden]", $parent);
            var $toggle = $(".dropdown-toggle", $parent)

            if ($input.length) {
                $input.val($(this).attr("data-value"));
                $toggle.val($(this).html());
            }

            $parent.trigger('OnChanged');
        });

        var $roamingTemplate = $("[data-template=roamingTemplate]");
        var $roamingTable = $("#roaming-table");
        var $topupRoamingTemplate = $("[data-template=topupRoamingTemplate]");
        var $topupRoamingTable = $("#topup-roaming-table");

        //modify in javascript way because revamp.yes.my is on and off
        $("[data-button=openRoaming]").click(function() {
            if ($("[name=roamingSelect]").val()) {
                var cid = $("[name=roamingSelect]").val();
               
                $(".nav-link").removeClass("active");
                // Add active class to the clicked button
                $(this).addClass("active");
                // Add active class to Day One tab specifically
                $("#dayone-tab").addClass("active");

                var sel = jsonRoaming[cid];
                var topup = topupOprrators[cid];
                var countryName= $("[data-name=countryName]").html(sel[0]['country_name']);
             
                if(sel[0]['country_name']=="Singapore"){
                    $("[data-country=Singapore]").css("display", "block");
                    $("[data-country=OtherCountry]").css("display", "none");
                }else if(sel[0]['country_name']=="Bahamas"){
                $("[data-country=Singapore]").css("display", "none");
                $("[data-country=OtherCountry]").css("display", "block");
                }else{
                    $("[data-country=Singapore]").css("display", "none");
                    $("[data-country=OtherCountry]").css("display", "block");
                }
              

            
                $roamingTable.empty();
                $topupRoamingTable.empty();
                for (var i = 0; i < sel.length; i++) {
                    var cur = sel[i];
                    console.log(cur);
                    $newTpl = $roamingTemplate.clone();
                    var telcoName =cur["operatorName"];
                    if (i > 0) {
                        $roamingTable.append("<hr/>");
                    }

                    $("[data-name=telcoName]", $newTpl).html(cur["operatorName"]);
                    if (cur["is4g"] == "0") {
                        $("[data-name=telcoIs4g]", $newTpl).hide();
                    } else {
                        $("[data-name=telcoIs4g]", $newTpl).show();
                    }
                    $("[data-name=planDayRateAmt]", $newTpl).html(cur["roamingRate"].replace(".00", "").replace("RM", ""));
                    $("[data-name=planDayRateSubset]", $newTpl).html(cur["roamingType"]);
               
              
            
                    if(cur['aseanPlusCountries'] === 'NoDay'){
                        var disclaimer = cur["quotaDisclaimer"];
                        var langAttributeValue = $('html').attr('lang');
                        if ((cur["quota"].trim() == '' && langAttributeValue == 'ms-MY') || langAttributeValue == 'ms-MY' ) {
                            $("[data-name=planDayRateQuota]", $newTpl).html('Perayauan Data Tanpa Had');
                            $("[data-name=planDayRateSubset]", $newTpl).html("/sehari");
                            
                        } else {
                            $("[data-name=planDayRateQuota]", $newTpl).html(cur["quota"]);
                            $("[data-name=planDayRateSubset]", $newTpl).html(cur["roamingType"]);
                        }
                        if (!disclaimer && cur["quota"] && langAttributeValue!='ms-MY') {
                            disclaimer = "Once the quota is finished, the data speed will be reduced until your day pass expires without additional cost.";
                            // disclaimer = "(500MB data berkelajuan tinggi dan 64kbps kemudian).";
                        }
                        else if(cur["quota"] && langAttributeValue=="ms-MY"){
                            var DataMB=cur["quota"].split(" ");
                            var storageValue = DataMB[2];
                            var disclaimer = "(" + storageValue + " data berkelajuan tinggi dan 64kbps kemudian).";
                        }
                        $("[data-country='aseanPlusCountry']").css("display", "none")
                    }else{
                        $("[data-country='aseanPlusCountry']").css("display", "block")
                        $("[data-name=planDayRateQuota]", $newTpl).html("<p class='unlimitedRoamin'>Unlimited Data Roaming</p>")
                        disclaimer = "(1GB highspeed data and 512kbps thereafter).";
                    }

                    $("[data-name=planDayRateTnc]", $newTpl).html(disclaimer);
                    if(langAttributeValue == "ms-MY"){
                        var beforeCountryName="Panggilan dalam";
                    }else{
                        beforeCountryName="Call Within"
                    }
                    $("[data-name=planCallWithinCountryTxt]", $newTpl).html( beforeCountryName  + " "+  sel[i]['country_name']);
                    $("[data-name=planCallWithinCountryRate]", $newTpl).html(cur["callRate"]);
                    $("[data-name=planCallToOtherCountriesRate]", $newTpl).html(cur["callToOther"]);
                    $("[data-name=planCallToMalaysiRate]", $newTpl).html(cur["callToMalaysia"]);
                    $("[data-name=planReceivingCallRate]", $newTpl).html(cur["receivingCallRate"]);
                    $("[data-name=planSmsRate]", $newTpl).html(cur["smsRate"]);
                    $newTpl.attr('data-asiancountriesdays', cur['aseanPlusCountries']);

                    // $newTpl.attr('data-countrytitle', cur['aseanPlusCountries']);
                    $("[data-countrytitle=aseanCountryTitle]", $newTpl).html(cur['aseanPlusCountries']);
                    $roamingTable.append($newTpl);

                 // Remove hr if data-asiancountriesdays is not equal to "NoDay"
                    if (cur['aseanPlusCountries'] !== 'NoDay') {
                        $roamingTable.find('hr').last().remove();
                    }
            
                    // Initial call to set the default header text based on active tab
                    if (cur['aseanPlusCountries'] !== 'NoDay') {
                        $('#header').html('<img class="mb-0" src="/wp-content/uploads/2024/06/roam-asian-logo.png" alt="YesRoam" /> <span data-countrytitle="aseanCountryTitle">' + cur['country_name'] + ' ' +'Daily Pass</span>');
                    } else {
                        $('#header').html('<img class="mb-0" src="/wp-content/uploads/2024/06/YesRoam-logo.png" alt="YesRoam" /> <span data-countrytitle="aseanCountryTitle">Day Pass</span>');
                    }
                 
                }
                $roamingTable.find('[data-asiancountriesdays]').hide();
                $roamingTable.find('[data-asiancountriesdays="1Day"], [data-asiancountriesdays="NoDay"]').show();


                      // Event listener for tab click
                      $('#dayone-tab').on('click', function() {
                        if (cur['aseanPlusCountries'] !== 'NoDay') {
                            $('.asean-storage-val').html('<p class="small" data-name="planDayRateTnc">(1GB highspeed data and 512kbps thereafter).</p>');
                            $('#header').html('<img class="mb-0" src="/wp-content/uploads/2024/06/roam-asian-logo.png" alt="YesRoam" /> <span data-countrytitle="aseanCountryTitle">' + cur['country_name'] + ' Daily Pass</span>');
                        } else {
                            $('.asean-storage-val').html('');
                            $('#header').html('<img class="mb-0" src="/wp-content/uploads/2024/06/YesRoam-logo.png" alt="YesRoam" /> <span data-countrytitle="aseanCountryTitle">Day Pass</span>');
                        }
                    });

                    $('#daythree-tab').on('click', function() {
                        if (cur['aseanPlusCountries'] !== 'NoDay') {
                            $('.asean-storage-val').html('<p class="small" data-name="planDayRateTnc">(5GB highspeed data and 512kbps thereafter).</p>');
                            $('#header').html('<img class="mb-0" src="/wp-content/uploads/2024/06/roam-asian-logo.png" alt="YesRoam" /> <span data-countrytitle="aseanCountryTitle">' + cur['country_name'] + ' 3 Days Pass</span>');
                        } else {
                            $('.asean-storage-val').html('');
                            $('#header').html('<img class="mb-0" src="/wp-content/uploads/2024/06/YesRoam-logo.png" alt="YesRoam" /> <span data-countrytitle="aseanCountryTitle">Day Pass</span>');
                        }
                    });

                    $('#dayseven-tab').on('click', function() {
                        if (cur['aseanPlusCountries'] !== 'NoDay') {
                            $('.asean-storage-val').html('<p class="small" data-name="planDayRateTnc">(10GB highspeed data and 512kbps thereafter).</p>');
                            $('#header').html('<img class="mb-0" src="/wp-content/uploads/2024/06/roam-asian-logo.png" alt="YesRoam" /> <span data-countrytitle="aseanCountryTitle">' + cur['country_name'] + ' 7 Days Pass</span>');
                        } else {
                            $('.asean-storage-val').html('');
                            $('#header').html('<img class="mb-0" src="/wp-content/uploads/2024/06/YesRoam-logo.png" alt="YesRoam" /> <span data-countrytitle="aseanCountryTitle">Day Pass</span>');
                        }
                    });


                $('#dayone-tab').on('click', function() {
                    $roamingTable.find('[data-asiancountriesdays]').hide();
                    $roamingTable.find('[data-asiancountriesdays="1Day"], [data-asiancountriesdays="NoDay"]').show();
                });

                $('#daythree-tab').on('click', function() {
                    $roamingTable.find('[data-asiancountriesdays]').hide();
                    $roamingTable.find('[data-asiancountriesdays="3Day"]').show();
                });

                $('#dayseven-tab').on('click', function() {
                    $roamingTable.find('[data-asiancountriesdays]').hide();
                    $roamingTable.find('[data-asiancountriesdays="7Day"]').show();
                });



                $("[data-roaming=roaming-rates]").show();
                $(document).scrollTop($("[data-fieldset=roaming]").offset().top);
                $topupTpl = $topupRoamingTemplate.clone();
                $("[data-name=topupTelcoName]", $topupTpl).html(telcoName);
               
                const topupAmounts = ["100", "150", "200", "300", "400", "500"];
                topupAmounts.forEach(amount => {
                    const dataName = `[data-name=topupPlanDayRateAmt_${amount}]`;
                    if (topup[`topup_${amount}mb_per_day`] == 0 || topup[`topup_${amount}mb_per_day`] == "") {
                        $(dataName, $topupTpl).parent().parent().parent().hide();
                    }else {
                        
                        $(dataName, $topupTpl).html('<sub>RM </sub>' +topup[`topup_${amount}mb_per_day`]);

                    }
                });

                // Append the modified template to the appropriate container
                $("[data-country=OtherCountry]").append($topupTpl.show());
                $("[data-country=OtherCountry] [data-template=topupRoamingTemplate]").replaceWith($topupTpl.show());
                if((topup['topup_100mb_per_day']=="" || topup['topup_100mb_per_day']== 0 ) && (topup['topup_150mb_per_day']=="" || topup['topup_150mb_per_day']==0 )  &&  (topup['topup_200mb_per_day']=="" || topup['topup_200mb_per_day']==0)  && (topup['topup_300mb_per_day']=="" || topup['topup_300mb_per_day']==0)  && (topup['topup_400mb_per_day']=="" || topup['topup_400mb_per_day']==0) && (topup['topup_500mb_per_day']=="" || topup['topup_500mb_per_day']==0) ){
                    $('#topUpRoamingTemp').css("display", "none"); 
                    $("h1 span[data-title='PAYU']").text("Pay As You Use");
                    // if(sel[0]['country_name']=="Bahamas"){
                    // }
                }else{
                        $("h1 span[data-title='PAYU']").text("Day Pass"); 
                    }
            }
        });

        $("[data-link=closeRoaming]").off('click').click(function() {
            $("[data-roaming=roaming-rates]").animate({
                scrollTop: $("#roaming-banner").offset().top,
            }, 350, function() {
                $(this).css("height", "").hide();
            });
        });

        $("[data-button=openIdd]").off('click').click(function() {
            if ($("[name=iddSelect]").val()) {
                var sel = jsonIdd[$("[name=iddSelect]").val()];

                $("[data-name=iddName]").html(sel["postpaid"]["country"] + " (" + sel["postpaid"]["countryCode"] + ")");
                $("[data-name=iddPostpaidFixed]").html(sel["postpaid"]["callRateFixed"]);
                $("[data-name=iddPostpaidMobile]").html(sel["postpaid"]["callRateMobile"]);
                $("[data-name=iddPostpaidSms]").html(sel["postpaid"]["smsRate"]);
                $("[data-name=iddPrepaidFixed]").html(sel["prepaid"]["callRateFixed"]);
                $("[data-name=iddPrepaidMobile]").html(sel["prepaid"]["callRateMobile"]);
                $("[data-name=iddPrepaidSms]").html("" + sel["prepaid"]["smsRate"]);


                $("[data-fieldset=idd]").show();
                $(document).scrollTop($("[data-fieldset=idd]").offset().top);
            }
        });

        $("[data-button=closeIdd]").off('click').click(function() {
            $('html').animate({
                scrollTop: $(".roaming-bg2").offset().top
            }, 200, function() {
                $("[data-fieldset=idd]").css("height", "").hide();
            });
        });

        //Add autocomplete for search rates
        $("#roaming-rates-picker").flexselect({
            preSelection: false,
            onSelected: function(val, name) {
                var $input = $("#roamingSelect");
                if ($input.length) {
                    $input.val(val);
                }
            }
        });

        //Add autocomplete for search Idd
        $("#roaming-idd-picker").flexselect({
            preSelection: false,
            onSelected: function(val, name) {
                var $input = $("#iddSelect");
                if ($input.length) {
                    $input.val(val);
                }
            }
        });



        $('.hero-slider').slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          fade: true,
          dots: true,
          autoplay: true,
          autoplaySpeed: 8000,
          responsive: [{
              breakpoint: 1024,
              settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  infinite: true,
                  dots: true,
                  arrows: false
              }
          }, {
              breakpoint: 768,
              settings: {
                  slidesToShow: 1,
                  arrows: false,
                  infinite: true,
                  dots: true,
                  slidesToScroll: 1,
              }
          }, {
              breakpoint: 600,
              settings: {
                  slidesToShow: 1,
                  arrows: false,
                  infinite: true,
                  dots: true,
                  slidesToScroll: 1
              }
          }, {
              breakpoint: 480,
              settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  dots: true,
                  infinite: true,
                  dots: true,
                  arrows: false
              }
          }]
      });

      $('.destinations-slider').slick({    
        prevArrow: '<a href="#" class="slide-arrow prev-arrow slick-arrow"><span class="iconify slick-prev" data-icon="eva:arrow-ios-back-fill"></span></a>',
            nextArrow: '<a href="#" class="slide-arrow next-arrow slick-arrow"><span class="iconify slick-next" data-icon="eva:arrow-ios-forward-fill"></span></a>',        
            infinite: false,
            slidesToShow: 8,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 3000,
            centerMode: false,
            dots: false,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                    arrows: false
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    arrows: false,
                    infinite: true,
                    dots: true,
                    slidesToScroll: 1,
                }
            }, {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    arrows: false,
                    infinite: true,
                    dots: true,
                    slidesToScroll: 3,
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    dots: true,
                    infinite: true,
                    dots: true,
                    arrows: false,
                    centerMode: false,
                }
            }]
        });


    });
</script>