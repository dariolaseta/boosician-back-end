
<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="card">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
    </div>
        <h1>L' oprazione ha avuto successo</h1> 
        <p>Abbiamo ricevuto la tua richiesta di acquisto;<br/>A breve verrai reindirizzato alla tua pagina personale.</p>
    </div>
    </body>

<script>
        // Imposta il ritardo in millisecondi (ad esempio, 5000ms per 5 secondi)
        var ritardoInMillisecondi = 5000;

        // Funzione per reindirizzare l'utente dopo il ritardo
        function reindirizza() {
            window.location.href = "{{ route('admin.musicians.show', ['musician' => $currentMusician]) }}";
        }

        // Avvia il ritardo e il reindirizzamento
        setTimeout(reindirizza, ritardoInMillisecondi);
    </script>








<style>
    body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
    }
    h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }
    p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size:20px;
        margin: 0;
    }
    i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
    }
    .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
    }
    </style>