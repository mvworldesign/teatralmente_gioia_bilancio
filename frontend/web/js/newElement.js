/**
 * Aggiunge elementi del form in maniera dinamica
 * Ogni nuovo elemento aggiunto viene gestito come array
 */
jQuery(document).ready(function(){
    jQuery("[data-action='click']").click(function(){
        var dataCopy        = "[data-copy='"+jQuery(this).attr("data-add")+"']";//Elemento da copiare
        var copy            = null;//Elemento copiato
        var add             = jQuery("[data-append='"+
                                        jQuery(this).attr('data-add')+"']");//Elemento dove aggiungere
        var inputElements   = jQuery(dataCopy+" input, "+dataCopy+" select");//Elementi input da selezionare
        
        jQuery(inputElements).each(function(o, el){//Add []
            var attrName = jQuery(el).attr("name")+"[]";
            
            jQuery(el).attr("name", attrName);
        });
        copy = jQuery(dataCopy).html();//Copy element
        jQuery(inputElements).each(function(o, el){//Remove []
            var attrName = jQuery(el).attr("name");
            
            jQuery(el).attr("name", attrName.replace("[]", ""));
        });
        
        jQuery(add).append(copy);
    });
});