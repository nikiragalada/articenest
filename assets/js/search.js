$('.search').submit(function(event) {
    event.preventDefault();
    var $inputs = $('.search').serializeArray();
    console.log($inputs);
    window.location.href = 'index.php?search=' + $inputs[0].value;
});