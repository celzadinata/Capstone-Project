function PreviewBerkas() {
  const reader = new FileReader();
  reader.readAsDataURL(event.target.files[0]); // event is from the HTML input
    document.getElementById("noFile").innerHTML = event.target.files[0].name;

};
