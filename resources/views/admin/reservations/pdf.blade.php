<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <style>
    *{
      /* padding: 0;
      margin: 0; */
    }
    .client header,
    .voyage header,
    .hotel-voyage header,
    .hotel-caracter header,
    .paiement header,
    .agence header{
      margin-bottom: 0.5rem;
      background: rgba(#000, #000, #000, .2);
      height: 2rem;
    }
    .client header h4,
    .voyage header h4,
    .paiement header h4,
    .agence header h4{
      /* background: rgba(#000, #000, #000, .6); */
      padding: 0.75%;
      margin: 0;
    }
    .client .info-client p,
    .voyage .info-voyage p,

    .paiement .info-paiement p,
    .agence .info-agence p{
      margin-top: 0;
      margin-bottom: 10px
    }
    .client .info-client p span:first-child(),
    .voyage .info-voyage p span:first-child(),,
    .paiement .info-paiement p span:first-child(),
    .agence .info-agence p span:first-child(){
      font-weight: bolder;
    }

.ec{
  color: red;
}
.payer{
  color: green
}
#header{
  text-align: center;
  border: 1px solid #000;
  border-radius: 2%;
  margin-bottom: 15px;
  padding: 1%
}
#header h3{
  margin: 0
}
/* .voyage .info-voyage .part-one,
.voyage .info-voyage .part-two{
  width: 50%;
} */
  </style>
  <header id="header">
    <h3>
      La reçu du reservation du client : {{ $reservation->client->name }} <br>
      {{ $reservation->num_reservation }}
    </h3>

  </header>
  <div @class(['client'])>
    <header>
      <h4>Information du client</h4>
    </header>
    <div @class(['info-client'])>
      <p>
        <span>Name : </span>
        <span>{{ $reservation->client->name }}</span>
      </p>
      <p>
        <span>Email : </span>
        <span>{{ $reservation->client->email }}</span>
      </p>
      <p>
        <span>Téléphone : </span>
        <span>{{ $reservation->client->telephone }}</span>
      </p>
      <p>
        <span>Genre : </span>
        <span>{{ $reservation->client->genre }}</span>
      </p>
    </div>
  </div>
  <div @class('voyage')>
    <header>
      <h4>Information du voyage</h4>
    </header>
    <div @class('info-voyage')>

        <p>
          <span>Date du départ : </span>
          <span>{{ $reservation->voyage->date_depart }}</span>
        </p>
        <p>
          <span>Date du retour : </span>
          <span>{{ $reservation->voyage->date_retour }}</span>
        </p>
        <p>
          <span>Heure du départ : </span>
          <span>{{ $reservation->voyage->heure_lance }}</span>
        </p>
        <p>
          <span>Heure du retour : </span>
          <span>{{ $reservation->voyage->heure_retour }}</span>
        </p>
        <p>
          <span>Ville du destination : </span>
          <span>{{ $reservation->voyage->ville_destination }}</span>
        </p>
        <p>
          <span>Nombre du jours : </span>
          <span>{{ $reservation->voyage->nombre_jour }}</span>
        </p>
        <p>
          <span>Prix : </span>
          <span>{{ $reservation->voyage->prix.' DHS' }}</span>
        </p>


  </div>


  <div @class('paiement')>
    <header>
      <h4>Information du paiement</h4>
    </header>
    <div @class(['info-paiement'])>
      <p>
        <span>Mode du paiement : </span>
        <span>{{ $reservation->voyage->mode_paiement}}</span>
      </p>
      <p>
        <span>Paiement : </span>
        @if ($reservation->voyage->statut_payer==="en cours")
          <span @class('ec')>
            {{ $reservation->voyage->statut_payer }}
          </span>
          @elseif ($reservation->voyage->statut_paiement==="payer")
          <span @class('payer')>
            {{ $reservation->voyage->statut_payer }}
          </span>
        @endif
      </p>
    </div>
  </div>

  <div @class('agence')>
    <header>
      <h4>Information d'agence</h4>
    </header>
    <div @class(['info-agence'])>

        <p>
          <span>Nom : </span>
          <span>{{ $reservation->agence->nom }}</span>
        </p>
        <p>
          <span>E-mail : </span>
          <span>{{ $reservation->agence->email }}</span>
        </p>
        <p>
          <span>Adresse : </span>
          <span>{{ $reservation->agence->adresse }}</span>
        </p>

        <p>
          <span>Ville : </span>
          <span>{{ $reservation->agence->ville }}</span>
        </p>
        <p>
          <span>ICE : </span>
          <span>{{ $reservation->agence->ice }}</span>
        </p>
        <p>
          <span>Patente : </span>
          <span>{{ $reservation->agence->patente }}</span>
        </p>

  </div>
</body>
</html>