var rumMOKey= phpParams.rumMOKey;
var collectorDomain='https://static.site24x7rum.com/beacon/site24x7rum-min.js?appKey=';
if(phpParams.dataCentreExt){
	switch(phpParams.dataCentreExt){
		case "cn":
			collectorDomain = 'https://static.site24x7rum.cn/rum/resources/beacon/site24x7rum-min.js?appKey='
			break;
		case "au":
			collectorDomain = 'https://static.site24x7rum.com.au/beacon/site24x7rum-min.js?appKey='
			break;
		default:
			collectorDomain = 'https://static.site24x7rum.'+phpParams.dataCentreExt+'/beacon/site24x7rum-min.js?appKey='		
	}
}
(function(w,d,s,r,k){
  if(w.performance && w.performance.timing && w.performance.navigation) {
    w[r] = w[r] || function() {
        (w[r].q = w[r].q || []).push(arguments)
    }
    var site24x7_rum_beacon=d.createElement('script');
    site24x7_rum_beacon.async=true;
    site24x7_rum_beacon.setAttribute('src',s+k);
    d.getElementsByTagName('head')[0].appendChild(site24x7_rum_beacon);
}
})(window,document,collectorDomain,'s247r',rumMOKey)