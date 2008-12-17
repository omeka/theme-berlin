function ReSize(imgobj){
// Area = width*height
// AspectRatio = width/height
// Area=width*width/AspectRatio
// width= square root(Area*AspectRatio)
longside = 558;

if (imgobj.width > imgobj.height )  {

	area=imgobj.width/imgobj.height;

	imgobj.width=longside;
	var newHeight =longside/area;


	imgobj.height=newHeight;

} else { // portrait & square

	area=imgobj.height/imgobj.width;

	imgobj.height=longside;

	var newWidth =longside/area;



	imgobj.width=newWidth;


}

}


function resizeThumbs() {
	if(!document.getElementsByTagName || !document.getElementById || !document.getElementsByTagName("img")) return;
	var itemimage = $("item-image");
	ReSize(itemimage);
}

Event.observe(window,'load',function() {
	resizeThumbs();
});