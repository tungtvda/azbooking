
// requestAnimationFrame polyfill
(function() {
    sliderPoint('program_slide','program_point');
    sliderPoint('tour_guide_full_slide','tour_guide_full_point');
    sliderPoint('tour_guide_local_slide','tour_guide_local_point');
    sliderPoint('hotel_slide','hotel_point');
    sliderPoint('restaurant_slide','restaurant_point');
    sliderPoint('transportation_slide','transportation_point');

    function sliderPoint(id_range, id_point){
        var slider = document.getElementById(id_range);
        var output = document.getElementById(id_point);
        output.innerHTML = slider.value; // Display the default slider value
        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    }
}());

