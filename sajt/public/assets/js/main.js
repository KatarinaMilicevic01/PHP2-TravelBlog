$(document).ready(function(){
    $(window).scroll(function() {
        if ($(document).scrollTop() > 400) {
          $('.scrollUp').fadeIn();
        } else {
          $('.scrollUp').fadeOut();
        }
      });
      $('.scrollUp').click(function() {
        $("html, body").animate({
          scrollTop: 0
        }, 50);
        return false;
      });

    function ajaxCallBack(url, method, data, result){
        $.ajax({
            url: url,
            method: method,
            data: data,
            dataType: "JSON",
            success: result,
            error: function(xhr, status, errorMsg){
                //console.log(xhr);
            console.log("poruka:"+errorMsg);
            }
        })
    }

    // ******** LIKE ********
    $("#like").on('click', function(){
        idOsoba = $("#korisnikId").text();
        idBlog = $("#postId").text();
        url = $(this).attr('data-action');
        data = {idOsoba : idOsoba, idBlog : idBlog};
        ajaxCallBack(url, "get", data, function(result){
            console.log(result);
            location.reload();
        })
    })

    // ******** UNLIKE ********
    $("#unlike").on('click', function(){
        idOsoba = $("#korisnikId").text();
        idBlog = $("#postId").text();
        data = {idOsoba : idOsoba, idBlog : idBlog};
        url = $("#unLike").attr('data-action');
        ajaxCallBack(url, "get", data, function(result){
            console.log(result);
            location.reload();
        })
    })

    $("#dodajKomentar").on('click', function(){
        idOsoba = $("#korisnikId").text();
        idBlog = $("#postId").text();
        komentar = $("#tbKom").val();
        data = {idOsoba : idOsoba, idBlog : idBlog, komentar : komentar};
        url = $(this).attr('data-action');

        greske = 0;

        if(komentar == ""){
            greske++;
            $("#kom-err").html('Ovo polje je obavezno.');
            $("#kom-err").addClass('alert alert-danger');
        }
        if(komentar.length < 10){
            greske++;
            $("#kom-err").html('Komentar mora imati minimum 10 karaktera.');
            $("#kom-err").addClass('alert alert-danger');
        }
        if(komentar.length > 255){
            greske++;
            $("#kom-err").html('Komentar ne sme biti duzi od 255 karaktera.');
            $("#kom-err").addClass('alert alert-danger');
        }

        if(greske == 0){
            ajaxCallBack(url, "get", data, function(result){
                if(result.poruka == "uspeh"){
                    location.reload();
                }
            })
        }
    })

    $("#editKom").on('click', function(){
            idKom = $("#idKom").text();
            komentar = $("#tbKom").val();
            data = {idKom: idKom, komentar : komentar};
            url = $(this).attr('data-action');

            greske = 0;

            if(komentar == ""){
                greske++;
                $("#kom-err").html('Ovo polje je obavezno.');
                $("#kom-err").addClass('alert alert-danger');
            }
            if(komentar.length < 10){
                greske++;
                $("#kom-err").html('Komentar mora imati minimum 10 karaktera.');
                $("#kom-err").addClass('alert alert-danger');
            }
            if(komentar.length > 255){
                greske++;
                $("#kom-err").html('Komentar ne sme biti duzi od 255 karaktera.');
                $("#kom-err").addClass('alert alert-danger');
            }

            if(greske == 0){
                ajaxCallBack(url, "get", data, function(result){
                    if(result.poruka == "uspeh"){
//                        $("#editRefresh").load(location.href+" #editRefresh>*","");
                        $("#editSuccess").html('Uspesno ste izmenili komentar.');
                        $("#editSuccess").addClass('alert alert-success');
                        location.reload();
                    }
                })
            }
        })

    $(".deleteComm").on('click',function(){
        id = $(this).attr('data-id');
        data = {id:id}
        ajaxCallBack("/obrisiKom","get",data,function(result){
            location.reload();
        })
    })

    $("#ddlKat").on('change',function(){
        idKat = $("#ddlKat option:selected").val();
        url = $("#ddlKat").attr('data-action');
        data = {idKat: idKat}
        ajaxCallBack(url, 'get', data, function(result){
            if(result.msg){
                $("#blogovi").html('<p class="my-5 text-center">Trenutno nema blogova za ovu kategoriju. </p>')
                $("#paginacija").html('');
            }
            $('body').html(result.html);
        })
    })

    $("#ddlSort").on('change',function(){
        sort = $("#ddlSort option:selected").val();
        url = $("#ddlSort").attr('data-action');
        data = {sortBy: sort}
        ajaxCallBack(url, 'get', data, function(result){
            $('body').html(result.html);
        })
    })

    $("#search").on("click", function(){
        search = $("#keyword").val();
        data = {keyword: search}
        ajaxCallBack('/blogovi', 'get', data, function(result){
        if(result.msg){
            $("#blogovi").html('<p class="my-5 text-center">Trenutno nema blogova za trazenu pretragu. </p>')
            $("#paginacija").html('');
        }
            $('body').html(result.html);
        })
    })
})
