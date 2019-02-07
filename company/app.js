var UIComponent = (function () {

    var url = 'http://whoami/Api/GetFirstName';
    var dataURL = 'data.json';

    return {
        getFirstName: function () {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var name = JSON.parse(this.responseText);
                    document.getElementById("firstName").textContent = 'Welcome ' + name.givenname + ', here are your Endava benefits';
                    // document.getElementById("firstName").append('Welcome '+ name.givenname +' here are your <b>Endava benefits</b>')
                }
            };

            xhr.open('GET', url);
            xhr.withCredentials = true;
            xhr.setRequestHeader('Content-Type', 'text/plain');
            xhr.send();
        },
        getData: function () {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var data = Object.values(JSON.parse(this.responseText));
                    var categories = Object.values(data[0]);
                    for (let i = 0; i < categories.length; i++) {
                        $(".container").append(
                            '<div id="' + i + '" class="container-items">' +
                            '<h3 class="category-title">' + categories[i].categorytitle + '</h3>' +
                            '<div class="items space-between"></div>' +
                            '</div>'
                        );
                        $(".container .container-items").addClass(name);
                        itemProps = Object.values(categories[i]["items"]);
                        for (let x = 0; x < itemProps.length; x++) {
                            $(".container").find($('#' + i + ' .items')).append(
                                '<div class="item-wrapper">' +
                                    '<div class="item">' +
                                        '<img src="' + itemProps[x].img_url + '" alt="logo" class="item-image" />' +
                                        '<div class="content">'+
                                            '<p class="item-text item-title">' + itemProps[x].title + '</p>' +
                                            '<p class="item-text item-description">' + itemProps[x].description + '</p>' +
                                        '</div>'+
                                        '<div class="middle">' +
                                            '<div class="text">Claim</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>'
                            );
                        };

                    };
                }
            };
            xhr.open('GET', dataURL);
            xhr.withCredentials = true;
            xhr.setRequestHeader('Content-Type', 'text/plain');
            xhr.send();
        }
        // hoverTile: function(){
        //     $('.item').hover(function(){

        //     })
        // }
        // styleElements: function(){
        //     $('.container-items').find($('.items .item:nth-last-child(-n+2)')).removeClass('item').addClass('item-7');
        // }

    }
})();

var appComponent = (function (UIComp) {

    return {
        init: function () {
            UIComp.getFirstName();
            UIComp.getData();
            // UIComp.styleElements();
        }
    }

})(UIComponent);

appComponent.init();