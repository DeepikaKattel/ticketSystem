// function yesnoCheck() {
//     if (document.getElementById('yesTrip').checked) {
//         document.getElementById('ifYes').style.display = 'block';
//     }
//     else document.getElementById('ifYes').style.display = 'block';
// }
document.getElementById('trip_type').addEventListener('change', function () {
    var style = this.value == 'Round Trip' ? 'block' : 'none';
    document.getElementById('ifYes').style.display = style;
});
