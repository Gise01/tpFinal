window.onload=function(){
    document.querySelector('btn-update-item').addEventListener('click', function(event){
        event.preventDefault();

        let id = this.data('id');
        let href = this.data('href');
        let quantity = ("#product_" + id).val();

        window.location.href = href + "/" + quantity;
    });
};