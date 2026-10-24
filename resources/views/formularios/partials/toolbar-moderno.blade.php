    @property --carpeta-angulo {
        syntax: "<angle>";
        inherits: false;
        initial-value: 0deg;
    }

    @keyframes recorrer-borde-carpeta {
        to {
            --carpeta-angulo: 360deg;
        }
    }

    .toolbar {
        position: relative;
        overflow: hidden;
        width: calc(100% - 24px);
        margin: 10px 12px 0;
        padding: 12px 16px 15px;
        border: 1px solid #ead7d7;
        border-left: 5px solid #a31616;
        border-radius: 16px;
        background: linear-gradient(110deg, #fff 0%, #fff 76%, #fff7f7 100%);
        box-shadow: 0 8px 24px rgba(78, 20, 20, 0.09);
        gap: 10px;
    }

    .toolbar::after {
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        height: 4px;
        background: linear-gradient(90deg, #8f0000, #d34848 50%, #8f0000);
        content: "";
        pointer-events: none;
    }

    .toolbar button,
    .toolbar > a {
        min-height: 38px;
        padding: 9px 14px;
        border: 1px solid #d8caca;
        border-radius: 10px;
        background: #fff;
        color: #334155;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: background-color 0.18s ease, border-color 0.18s ease, box-shadow 0.18s ease, transform 0.18s ease;
    }

    .toolbar button:hover,
    .toolbar > a:hover {
        transform: translateY(-1px);
        border-color: #c98f8f;
        background: #fff7f7;
        box-shadow: 0 3px 9px rgba(78, 20, 20, 0.1);
    }

    .toolbar .btn-borrar {
        border-color: #edcaca;
        background: #fff7f7;
        color: #a31616;
    }

    .toolbar .carpeta-destino {
        position: relative;
        isolation: isolate;
        display: flex;
        flex-direction: column;
        gap: 4px;
        min-width: 190px;
        padding: 8px 10px;
        border: 1px solid #f0dada;
        border-radius: 14px;
        background: #fff;
        box-shadow: 0 3px 10px rgba(143, 0, 0, 0.08);
    }

    .toolbar .carpeta-destino::before {
        position: absolute;
        z-index: -1;
        inset: -1px;
        padding: 6px;
        border-radius: inherit;
        background: conic-gradient(
            from var(--carpeta-angulo),
            transparent 0deg 285deg,
            #fca5a5 305deg,
            #a31616 330deg,
            #fca5a5 350deg,
            transparent 360deg
        );
        content: "";
        animation: recorrer-borde-carpeta 2.8s linear infinite;
        pointer-events: none;
        mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        mask-composite: exclude;
    }

    .toolbar .carpeta-destino label,
    .toolbar .carpeta-destino select {
        position: relative;
        z-index: 1;
    }

    .toolbar .carpeta-destino label {
        color: #6b3333;
        font-size: 11px;
        font-weight: 700;
    }

    .toolbar .carpeta-destino select {
        min-height: 38px;
        max-width: 250px;
        padding: 7px 30px 7px 10px;
        border: 1px solid #d8caca;
        border-radius: 10px;
        background: #fff;
        color: #334155;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
    }

    .toolbar .carpeta-destino select:focus {
        border-color: #a31616;
        outline: 3px solid rgba(163, 22, 22, 0.12);
    }

    .toolbar .btn-imprimir {
        border-color: #8f0000 !important;
        border-radius: 10px;
        background: linear-gradient(135deg, #b91c1c, #8f0000) !important;
        color: #fff !important;
        box-shadow: 0 3px 9px rgba(143, 0, 0, 0.2);
    }

    .toolbar .btn-imprimir:hover {
        background: linear-gradient(135deg, #a31616, #730000) !important;
    }

    .toolbar .btn-ver-formularios {
        border-color: #d8aaaa;
        background: #fff;
        color: #8f0000;
    }

    .toolbar .zoom-control {
        border-color: #ead7d7;
        border-radius: 11px;
        background: rgba(255, 255, 255, 0.82);
    }

    .toolbar .zoom-control button {
        min-height: 32px;
        border-radius: 8px;
    }

    .toolbar .estado-guardado {
        border-radius: 999px;
    }

    @media screen and (max-width: 800px) {
        .toolbar {
            width: calc(100% - 16px);
            margin: 8px 8px 0;
            padding: 10px 12px 14px;
            border-radius: 14px;
        }

        .toolbar .carpeta-destino {
            width: 100%;
            min-width: 0;
        }

        .toolbar .carpeta-destino select {
            width: 100%;
            max-width: none;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .toolbar .carpeta-destino::before {
            animation: none;
        }
    }
