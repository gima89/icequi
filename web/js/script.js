$(document).ready(
	function () {
	$("#reg").click(function (e) { //al click del tag A con id log nell'header
		e.preventDefault(); //impedisce che segua la rotta
		var urlPaginaRegister = $(this).attr('href'); //prende l'href del tag a, che contiene la rotta /login
		$.ajax({ //funzione nativa di jQuery che effettua una chiamata asincrona
		  url: urlPaginaRegister //va sull'url che gli abbiamo passato sopra
		}).done(function (data) { //una  volta ottenuta risposta, prende il contenuto della pagina chiamata
		  $('#signUpPopUp').html(data); // e lo butta dentro all'HTML dell'elemento con ID signInPopUp
			$("#layer").fadeIn("slow"); // fa comparire il Layer
			$("#signUpPopUp").fadeIn("fast"); // fa comparire il popUp
		});
	});
});

$(document).ready(
	function(){
	$("#signUpClose").click(function(){
		$("#layer").fadeOut("slow");
		$("#signUpPopUp").fadeOut("fast");
	});
});

//chiamata del popup di login
$(document).ready(
	function () {
	$("#log").click(function (e) { //al click del tag A con id log nell'header
		e.preventDefault(); //impedisce che segua la rotta
		var urlPaginaLogin = $(this).attr('href'); //prende l'href del tag a, che contiene la rotta /login

		$.ajax({ //funzione nativa di jQuery che effettua una chiamata asincrona
		  url: urlPaginaLogin //va sull'url che gli abbiamo passato sopra
		}).done(function (data) { //una  volta ottenuta risposta, prende il contenuto della pagina chiamata
		  $('#signInPopUp').html(data); // e lo butta dentro all'HTML dell'elemento con ID signInPopUp
			$("#layer").fadeIn("slow"); // fa comparire il Layer
			$("#signInPopUp").fadeIn("fast"); // fa comparire il popUp
		});
	});
});

$(document).ready(
	function(){
	$("#signInClose").click(function(){
		$("#layer").fadeOut("slow");
		$("#signInPopUp").fadeOut("fast");
		$("#signInForm").slideDown("fast");
		$("#forgottenForm").slideUp("fast");
	});
});

$(document).ready(
	function(){
	$("#forgotten").click(function(e){
		e.preventDefault();
		var paginaReset=$(this).attr('href');
		$.ajax({ //funzione nativa di jQuery che effettua una chiamata asincrona
			url: paginaReset //va sull'url che gli abbiamo passato sopra
		}).done(function (data) { //una  volta ottenuta risposta, prende il contenuto della pagina chiamata
			$('#forgottenForm').html(data); // e lo butta dentro all'HTML dell'elemento con ID signInPopUp
			$("#signInForm").slideUp("slow");
			$("#forgottenForm").slideDown("slow");
		});
	});
});

$(document).ready(
	function(){
	$("#tornaAlLogin").click(function(){
		$("#signInForm").slideDown("slow");
		$("#forgottenForm").slideUp("slow");
	});
});


//PANNELLO RICERCA

$(document).ready(
	function(){
	$(".invita").click(function(){
		$("#layer").fadeIn("slow");
		$("#inviteFriendsPopUp").fadeIn("fast");
	});
});

$(document).ready(
	function(){
	$("#inviteFriendsClose").click(function(){
		$("#layer").fadeOut("slow");
		$("#inviteFriendsPopUp").fadeOut("fast");
	});
});


$(document).ready(
	function(){
		$("#arrow").click(function(){
			$("#searchPanel").slideToggle("slow");
		});
	}
);

$(document).ready(
	function(){
		$("#ricerca").click(function(){
			$("#searchPanel").slideToggle("slow");
		});
	}
);

$(document).ready(
	function(){
		$("#overviewArrow").click(function(){
			$("#overviewPic").slideToggle("slow");
		});
	}
);

//POPUP GUSTI
$(document).ready(
	function(){
	$(".imgGusti").click(function(){
		$("#layerGusti").fadeIn("slow");
		$("#popupGusti").fadeIn("fast");
	});
});

$(document).ready(
	function(){
	$("#gustiClose").click(function(){
		$("#layerGusti").fadeOut("slow");
		$("#popupGusti").fadeOut("fast");
	});
});


//PALLINO ATTIVO

$(document).ready(
function(){
	$(".circle").click(function(){
		$(".circle").removeClass("current");
		$(this).addClass("current");
	});
});

$(document).ready(
function(){
	$("#startButton").click(function(){
		$(".circle").removeClass("current");
		$("#cerchio2").addClass("current");
	});
});

$(document).ready(
function(){
	$("#cityButton").click(function(){
		$(".circle").removeClass("current");
		$("#cerchio3").addClass("current");
	});
});

$(document).ready(
function(){
	$("#daysButton").click(function(){
		$(".circle").removeClass("current");
		$("#cerchio4").addClass("current");
	});
});


/*
function attiva(element){
	var x = document.getElementsByClassName("circle");
	for (var i=0;i<x.length;i++) x[i].style.backgroundColor="#C1C1C1";
	element.style.backgroundColor="#2E75B6";
}*/

// CAMBIO IMMAGINI DINAMICO
function changePic(pic){
		var emptyStar="http://www.esniulm.it/tag/img/favoriteStar.png";
		var goldenStar="http://www.esniulm.it/tag/img/yellowStar.png";
		pic.src==emptyStar ? pic.src=goldenStar : pic.src=emptyStar;
		pic.src==emptyStar ? pic.alt="Aggiungi ai preferiti" : pic.alt="Rimuovi dai preferiti";
		pic.src==emptyStar ? pic.title="Aggiungi ai preferiti" : pic.title="Rimuovi dai preferiti";
	}

function giraFreccia(){
	$freccia=document.getElementById("arrow");
	$su="http://www.esniulm.it/tag/img/upArrow.png";
	$giu="http://www.esniulm.it/tag/img/downArrow.png";
	$freccia.src==$giu ? $freccia.src=$su : $freccia.src=$giu;
}

function giraFrecciaOverview(){
	$freccia=document.getElementById("overviewArrow");
	$suggerimento=document.getElementById("suggerimento");
	$su="http://www.esniulm.it/tag/img/upArrow.png";
	$giu="http://www.esniulm.it/tag/img/downArrow.png";
	if($freccia.src==$su){
		$freccia.src=$giu;
		$suggerimento.innerHTML="espandi finestra";
	} else{
		 $freccia.src=$su;
		 $suggerimento.innerHTML="riduci finestra";
	}

}

//GELATO DINAMICO NELLE IMPOSTAZIONI
/*
$(document).ready(
function(){
	$("#changePsw").click(function(){
		$("#defaultCity").removeClass("gelato");
		$(this).addClass("gelato");
	});
});

$(document).ready(
function(){
	$("#defaultCity").click(function(){
		$("#changePsw").removeClass("gelato");
		$(this).addClass("gelato");
	});
});*/

//tendina di selezione modifica gusti
$(document).ready(function () {
	$('#selectFlavourToModify').on('change', function (el) {
		var id = $("option:selected", this).val();
		$.ajax({
			url: '/admin/updFlavour/' + id
		})
		.done(function (data) {
			$('#formGusto').html(data);
		})
	});
});

//tendina seleziona Regione di Modifica Gelateria che influisce sulle Province
$(document).ready(function(){
	$('#regToModify').on('change', function(){
		var id=$("option:selected", this).val();
		$.ajax({
			url: '/admin/updGelProvince/'+id
		})
		.done(function(data){
			$('#selProvincia').html(data);
		})
	})
})
//tendina seleziona Regione di Segnala Gelateria che influisce sulle Province
$(document).ready(function(){
	$('#regToSig').on('change', function(){
		var id=$("option:selected", this).val();
		$.ajax({
			url: 'segnalaProvincia/'+id
		})
		.done(function(data){
			$('#sezProvincia').html(data);
		})
	})
})

//tendina seleziona Regione di Impostazioni Account che influisce sulle Province
$(document).ready(function(){
	$('#tendinaRegioni').on('change', function(){
		var id=$("option:selected", this).val();
		$.ajax({
			url: 'settings/provinceFilter/'+id
		})
		.done(function(data){
			$('#sezioneProvincie').html(data);
		})
	})
})
