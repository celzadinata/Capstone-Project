function PreviewBerkas() {
  const reader = new FileReader();
  reader.readAsDataURL(event.target.files[0]); // event is from the HTML input
    document.getElementById("noFile").innerHTML = event.target.files[0].name;

};
function PreviewBerkas2() {
  const reader = new FileReader();
  reader.readAsDataURL(event.target.files[0]); // event is from the HTML input
    document.getElementById("noFile2").innerHTML = event.target.files[0].name;

};
function PreviewBerkas3() {
  const reader = new FileReader();
  reader.readAsDataURL(event.target.files[0]); // event is from the HTML input
    document.getElementById("noFile3").innerHTML = event.target.files[0].name;

};
