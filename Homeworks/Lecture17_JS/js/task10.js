function formValidation() {
    var country = document.getElementById('country').value;
    if (country === "other") {
        document.getElementById('country').style.borderColor = 'red';
        document.getElementById('additional_country_label').style.visibility = 'visible';
        document.getElementById('additional_country').style.visibility = 'visible';
        document.getElementById('additional_country_label').style.display = 'inline-block';
        document.getElementById('additional_country').style.display = 'inline-block';
    }
}
