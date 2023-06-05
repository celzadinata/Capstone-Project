function prosesMenu()
{
	var input = document.getElementById("cari");
	var filter = input.value.toLowerCase();
	var ul = document.getElementById("konten");
	var li = document.querySelectorAll("h4")
	console.log(li)
	for(var i = 0; i<li.length; i++){
		var ahref = document.querySelectorAll("a")[i];
		if(ahref.innerHTML.toLowerCase().indexOf(filter) > -1){
			li[i].style.display = "";
		}else{
			li[i].style.display = "none";
		}
	}
}
