window.onload=function (){
    GetSubCategory();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#category").on("change",function(){
       GetSubCategory();
    })

    function GetSubCategory(){
        var val = $("#category").val();
        $.ajax({
            url: urlToGetSubCategory + "/" + val,
            method: 'GET',
            dataType: "JSON",
            success: function(data) {
                var html ="";
                data.forEach(e =>{
                    html+=`<option value="${e.id}">${e.name}</option>`
                })
                $("#subcategory").html(html);

                console.log(data);

            },
            error: function ($err){
                console.log('Ne radi');
            }
        });
    }

    $("#subcategory").on("change",function(){
        filter();
    })
    $("#button-search").click(function (){
        console.log("ok")
        filter();
    })
    $("#search").on("keyup",function (){
        filter();
    })

    $('#sacuvaj').click(function(e) {
        e.preventDefault();
        let id = idPlace;
        let discount = $("#discount").is(":checked") ? 1:0;
        let parking = $("#parking").is(":checked") ? 1:0;
        let toilet = $("#toilet").is(":checked") ? 1:0;
        let elavator = $("#elavator").is(":checked") ? 1:0;
        let ground_level = $("#ground_level").is(":checked") ? 1:0;
        let wheelchair_entrance = $("#wheelchair_entrance").is(":checked") ? 1:0;
        let stuff = $("#stuff").is(":checked") ? 1:0;
        let grad = $("#grad").val();
        let ime = $("#name").val();
        let adresa = $("#adress").val();
        let x = $("#x").val();
        let y = $("#y").val();
        let id_category = $("#category").val();
        let dodatneInformacije = $("#dodatneInformacije").val();
         let lmao = {
            discount : discount,
                parking : parking,
                toilet : toilet,
                elavator : elavator,
                ground_level : ground_level,
                wheelchair_entrance : wheelchair_entrance,
                stuff : stuff,
                grad : grad,
                ime : ime,
                adresa : adresa,
                x: x,
                y: y,
                dodatneInformacije : dodatneInformacije
        }
        console.table(lmao)

        $.ajax({
            url: urlToVerfy,
            method: 'POST',
            data:{
                id:idPlace,
                discount : discount,
                parking : parking,
                toilet : toilet,
                elevator : elavator,
                ground_level : ground_level,
                wheelchair_entrance : wheelchair_entrance,
                professional_staff : stuff,
                id_city : grad,
                id_category : id_category,
                name : ime,
                address : adresa,
                x: x,
                y: y,
                description : dodatneInformacije
            },
            success: function(data) {
                console.log('Uspesno poslat ajax')
            },
            error: function ($err){
                console.log('Ne radi');
            }
        });
    });
    $('#otkazi').click(function(e) {
        e.preventDefault();
        var id_place = $("#otkazi").attr("id-place");
        console.log(id_place);
        $.ajax({
            url: urlToRemoveSuggest,
            method: 'delete',
            data:{
                id:id_place
            },
            success: function(data) {
                console.log('Uspesno poslat ajax')
            },
            error: function ($err){
                console.log($err);
                console.log('Ne radi');
            }
        });
    });

    $(".rating__input").click(function(){
        var br = $(this).attr("redni-br") - 1;
        console.log(br);
        $.ajax({
            url: urlToAddRate,
            method: 'POST',
            dataType: "JSON",
            data:{
              "rate":br,
              "id_place":id_place_,
            },
            success: function (data) {

                console.log(data);
                alert(data.message);
            },
            error: function ($err) {
                alert("Doslo je greske!");

            }
        });
    })

     function filter(){
        var text = $("#search").val();
        if(text == "") text ="+";
        var cat = $("#subcategory").val();
        $.ajax({
            url: urlTOFilter + "/" + text + "/" + cat ,
            method: 'get',
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                let html = ``;
                for(let i = 0; i<data.length; i++){
                    html+=`
                        <section>
                            <div class="container">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr style=" display: flex; text-align: center">
                                            <td><img src="${putanjaZaSlike + '/' + data[i].src}" alt="" width="100%" height="100%"/></td>
                                            <td style="display: flex; justify-content: center; align-items: center">
                                                <a href=""><h4>${data[i].name}</h4></a>
                                            </td>
                                            <td style="display: flex; justify-content: center; align-items: center; text-align: left">
                                                ${data[i].description}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    `
                }
                $("#telo-tabele").html(html);
                console.log('Uspesno poslat ajax')
            },
            error: function ($err) {
                console.log('Ne radi');
            }
        });
    }
}
