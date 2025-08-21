<!DOCTYPE html>
<html>
<head>
    <title>Certificado</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 16px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 50px;
            box-sizing: border-box;
            border: 2px solid #333;
            border-radius: 10px;
            background-color: #fff;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        p {
            line-height: 1.5;
            margin-bottom: 20px;
        }
 

        .font-bold {
            font-weight: bold;
        }

        .flex {
            display: flex
        }

        .justify-between {
            justify-content: space-between;
        }

        .w-full {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ACTA DE EXENCIÓN DE EXAMEN PROFESIONAL</h1>
        <p>
            La Universidad Tecnológica de Huejotzingo manifiesta que, el C. 
            <span class="font-bold">
                {{ $nombre }}
            </span> 
            de la carrera de 
            <span class="font-bold">
                {{ $carrera }}
            </span>
            con número de matrícula
            <span class="font-bold">
                {{ $matricula }}
            </span>
            presentó la Memoria de Estadía: "
            <span class="font-bold">
                {{ $titulo }}
            </span>
            ", cumpliendo satisfactoriamente con lo estipulado en la única opción de titulación.
        </p>
        <p>
            Por lo que se extiende la presente, para los efectos legales que haya lugar, en Santa Ana Xalmimilulco, Huejotzingo, Pue., a los {{ $fecha }}.
        </p>
        <div class="flex justify-between w-full">
            <p>Subdirector de Servicios Escolares</p>
            <p>Director de Carrera</p>
        </div>
    </div>
</body>
</html>