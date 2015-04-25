$(function(){
    $('.postcode').autocomplete({
        minLength: 0,
        source: '/customers/postcode-search',
        appendTo: $(this).parent(),
        focus: function( event, ui ) {
            $( this ).val( ui.item.label );
            return false;
        },
        select: function( event, ui ) {
            $( this ).val( ui.item.label );
            console.log('item', ui.item);

            return false;
        }
    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li class='list-group-item list-autocomplete'>" )
            .append( "<a>" + item.label + "</a>" )
            .appendTo( ul );
    };





});