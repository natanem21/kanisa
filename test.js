var element = document.createElement("input");
var number=0;
element.type="file";
element.name="cert"+number.toString();
element.textContent="this has been created for test";
document.body.appendChild(element);
document.getElementById("f").appendChild