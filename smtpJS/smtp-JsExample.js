

function sendEmail(){

    let solicitante = document.getElementById("solicitante").value;
    let Solicitante = solicitante.toUpperCase();
    let agraciados = document.getElementById("agraciados").value;
    let Agraciados = agraciados.toUpperCase();
    let dataDoFatoAmericana = document.getElementById("data").value;//date in american format
    let emailSolicitante = document.getElementById("emailSolicitante").value;
    let sintese = document.getElementById("sintese").value;
    let Sintese = sintese.toUpperCase();
    
    var checkBoxes = document.querySelectorAll('[name=check-box]:checked');  

    var SelectCheckBoxes = [];
    for(var i = 0; i < checkBoxes.length; i++) {
        SelectCheckBoxes.push(checkBoxes[i].value);
    }

    var SelectCheckBoxesSeparate = SelectCheckBoxes.join(' E ');

    let dataDoFatoBrasileira = dataDoFatoAmericana.split('-').reverse().join('/');//transform date to brazilian format

    let emailControle = "emailControle@example.com";
    let emailCopia ="emailCopia@example.com";
    let emailOutraCopia ="emailOutraCopia@example.com";
    let destinatario =  emailOutraCopia + ", " + emailControle + ", " + emailSolicitante + ", " + emailCopia;

    let corpoDoEmail = //body email
    "<br><b>SOLICITANTE: </b>" + Solicitante + 
    "<br><br> <b>AGRACIADOS: </b>" + Agraciados + 
    "<br><br> <b>DATA DO FATO: </b>" + dataDoFatoBrasileira + 
    "<br><br> <b>TIPO DO PEDIDO: </b>" + SelectCheckBoxesSeparate + 
    "<br><br> <b>EMAIL DO SOLICITANTE: </b>" + emailSolicitante + 
    "<br><br> <b>SINTESE: </b><br>" + Sintese + "<br><br>"
    ;

    Email.send({
        Host : "smtp.elasticemail.com",
        Username : "yourUsername",
        Password : "YourPassword",
        To : destinatario,
        From : "emaildestino@exemplo.com",
        Subject : "YourSubject",
        Body : corpoDoEmail
    })

    .then(
        message => alert(message)
      );

}
 




