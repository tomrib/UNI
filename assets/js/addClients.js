const telephoneInput = document.getElementById("phone");

telephoneInput.addEventListener("input", function () {
  let phoneNumber = telephoneInput.value.replace(/\D/g, ""); //
  phoneNumber = phoneNumber.slice(0, 10);

  if (phoneNumber.length > 2) {
    phoneNumber = phoneNumber.slice(0, 2) + " " + phoneNumber.slice(2);
  }
  if (phoneNumber.length > 5) {
    phoneNumber = phoneNumber.slice(0, 5) + " " + phoneNumber.slice(5);
  }
  if (phoneNumber.length > 8) {
    phoneNumber = phoneNumber.slice(0, 8) + " " + phoneNumber.slice(8);
  }
  if (phoneNumber.length > 11) {
    phoneNumber = phoneNumber.slice(0, 11) + " " + phoneNumber.slice(11);
  }
  if (phoneNumber.length > 14) {
    phoneNumber = phoneNumber.slice(0, 14);
  }

  telephoneInput.value = phoneNumber;
});
