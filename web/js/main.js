var $collectionHolder;
var $addProductLink = $('<a href="#" class="add_product_link btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>')
var $newLinkLi = $('<li></li>').append($addProductLink);

jQuery(document).ready(function () {
    $collectionHolder = $('ul.products');
    $collectionHolder.find('li').not('.error').each(function () {
            addProductFormDeleteLink($(this));
    });
    $collectionHolder.append($newLinkLi);
    $collectionHolder.data('index', $collectionHolder.find(':input').length);
    $addProductLink.on('click', function (e) {
        e.preventDefault();
        addProductForm($collectionHolder, $newLinkLi)
    });

    function addProductForm($collectionHolder, $newLinkLi) {
        var prototype = $collectionHolder.data('prototype');
        var index = $collectionHolder.data('index');
        var newForm = prototype.replace(/__name__/g, index);

        $collectionHolder.data('index', index + 1);

        var $newFormLi = $('<li></li>').append(newForm);
        $newLinkLi.before($newFormLi);

        addProductFormDeleteLink($newFormLi)
    }

    function addProductFormDeleteLink($productFormLi){
        var $removeFormA = $('<a href="#">Supprimer ce produit</a>');
            $productFormLi.append($removeFormA);

        $removeFormA.on('click', function(e){
            e.preventDefault();
            $productFormLi.remove();
        });
    }
});
