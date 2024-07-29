$(document).ready(function(){
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
         nizId=[];

function navNotification(){

        ajaxCallBack("/admin/navNotification", "get", {}, function(result){
                console.log(result);
                if(result.poruka.length == 0){
                    $("#brPoruka").hide();
                }
                $("#brPoruka").html(result.poruka.length);
                $(".brNot").html(result.akcije.length);
                brObav = result.akcije.length;
                if(brObav == 0){
                    $("#brNot").hide();
                }
                else{
                    $("#brNot").html(brObav);
                    br = brObav + ' '+ (brObav === 1 ? 'obavestenje' : 'obavestenja');
                    $("#brObav").html(br);
                }
                html='';
                result.poruka.forEach(function(poruka){
                    html+=`<a href="#" class="dropdown-item disabled">
                             <div class="media">
                                  <div class="media-body idNot">
                                      <h3 class="dropdown-item-title">
                                          ${poruka.osoba.ime} ${poruka.osoba.prezime}

                                      </h3>
                                      <p class="id" data=${poruka.idPoruka}></p>
                                      <p class="text-sm poruka">${poruka.poruka}</p>
                                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> ${poruka.datum}</p>
                                  </div>
                            </div>
                            </a>
                            <div class="dropdown-divider"></div>`;
                });
                $('#porukeLista').html(html);

               logovanje = 0;
               registrovanje = 0;
               lajk = 0;
               komentar = 0;
               odjava = 0;
               poruka = 0;
               pregled = 0;
                result.akcije.forEach(function(akcija){
                    nizId.push(akcija.idAkcija)

                    if(akcija.tipAkcije == 'Logovanje'){
                        logovanje++;
                    }
                    else if(akcija.tipAkcije == 'Registrovanje'){
                        registrovanje++;
                    }
                    else if(akcija.tipAkcije == 'Lajk'){
                        lajk++;
                    }
                    else if(akcija.tipAkcije == 'Komentar'){
                        komentar++;
                    }
                    else if(akcija.tipAkcije == 'Poruka'){
                        poruka++;
                    }
                    else if(akcija.tipAkcije == 'Pregled bloga'){
                        pregled++;
                    }
                })
                htmlNot='';
                if(logovanje != 0){
                     htmlNot+=` <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item disabled">
                         <i class="fas fa-users mr-2"></i> ${logovanje} ${logovanje === 1 ? 'logovanje' : 'logovanja'}
                     </a>`;
                  }
                if(registrovanje != 0){
                     htmlNot+=` <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item disabled">
                         <i class="fas fa-users mr-2"></i> ${registrovanje} ${registrovanje === 1 ? 'registrovanje' : 'registrovanja'}
                     </a>`;
                  }
                if(lajk != 0){
                    htmlNot+=` <div class="dropdown-divider"></div>
                                         <a href="#" class="dropdown-item disabled">
                                             <i class="fas fa-thumbs-up mr-2"></i> ${lajk} ${lajk === 1 ? 'lajk' : 'lajka'}
                                         </a>`;
                }
                if(komentar !=0){
                    htmlNot+=` <div class="dropdown-divider"></div>
                                         <a href="#" class="dropdown-item disabled">
                                             <i class="fas fa-comments mr-2"></i> ${komentar} ${komentar === 1 ? 'komentar' : 'komentara'}
                                         </a>`;
                }
                if(poruka != 0){
                     htmlNot+=` <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item disabled">
                         <i class="fas fa-envelope mr-2"></i> ${poruka} ${poruka === 1 ? 'poruka' : 'poruke'}
                     </a>`;
                }
                if(pregled !=0 ){
                    htmlNot+=` <div class="dropdown-divider"></div>
                                         <a href="#" class="dropdown-item disabled">
                                             <i class="fas fa-eye mr-2"></i> ${pregled} ${pregled === 1 ? 'pregled bloga' : 'pregleda bloga'}
                                         </a>`;
                }
                $("#obavestenja").html(htmlNot);

                })
    }
    navNotification();

    $(".not").on('click', function(){
            $("#brNot").hide();
            function oznaciProcitano(idNiz){
                 console.log(idNiz)
                 data ={idNiz:idNiz}
                 ajaxCallBack("/admin/procitanaAkcija", "get", data, function(result){
                     console.log(result);
                 })
             }
            oznaciProcitano(nizId);
   })
    $(".msgNot").on('click', function(){
        $("#brPoruka").hide();

        var idNiz = [];

        $(".id").each(function() {
            var id = $(this).attr("data");
            if(id != undefined){
                idNiz.push(id);
        }

        })
        console.log(idNiz)
        data = {idNiz : idNiz};
        ajaxCallBack("/admin/procitanaPoruka", "get", data, function(result){
            console.log(result);
        })
    })

    $("#ddlDatum").on('change',function(){
        datum = $("#ddlDatum option:selected").val();
        data = {datum: datum}
        ajaxCallBack('/admin/filterAktivnosti', 'get', data, function(result){

            $('body').html(result.html);
            $('.content-wrapper').css('min-height','100vh');
                      $('body').css('min-height', '100vh');
        })
    })

    $("#dodajKat").on('click',function(){
        kat = $("#kat").val();
        data = {kategorija: kat}
        ajaxCallBack("/admin/dodajKategoriju","get",data,function(result){
            location.reload();
        })
    })


})

