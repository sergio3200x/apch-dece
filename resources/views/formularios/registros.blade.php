<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registros de formularios | APCH</title>

    <style>

        :root {
            --apch-50: #fff5f5;
            --apch-100: #fee2e2;
            --apch-200: #fecaca;
            --apch-300: #fca5a5;
            --apch-400: #f87171;
            --apch-500: #ef4444;
            --apch-600: #dc2626;
            --apch-700: #b30000;
            --apch-800: #8f0000;
            --apch-900: #650000;

            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-300: #cbd5e1;
            --slate-400: #94a3b8;
            --slate-500: #64748b;
            --slate-600: #475569;
            --slate-700: #334155;
            --slate-800: #1e293b;
            --slate-900: #0f172a;
        }


        /* ==============================
           CONFIGURACIÓN GENERAL
           ============================== */

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--slate-100);
            color: var(--slate-800);
            font-family: "Segoe UI", Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }


        /* ==============================
           ANIMACIONES
           ============================== */

        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(14px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes ping {
            75%,
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }


        /* ==============================
           ENCABEZADO
           ============================== */

        .page-header {
            position: relative;
            width: 100%;
            margin: 0;
            overflow: hidden;
            border: 0;
            border-bottom: 1px solid var(--slate-200);
            border-radius: 20px;
            background: linear-gradient(115deg, #fff 0%, #fff 72%, #fff7f7 100%);
            box-shadow: 0 12px 32px rgba(15, 23, 42, 0.07);
        }

        .page-header::before {
            position: absolute;
            inset: 0 auto 0 0;
            width: 5px;
            background: linear-gradient(180deg, #d34848, #8f0000);
            content: "";
        }

        .page-header::after {
            position: absolute;
            inset: auto 0 0;
            height: 4px;
            background: linear-gradient(90deg, #8f0000, #d34848 50%, #8f0000);
            content: "";
        }

        .header-inner {
            width: 100%;
            max-width: none;
            margin: 0 auto;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            min-height: 104px;
            padding: 12px 28px;
        }

        .institution-brand {
            display: flex;
            align-items: center;
            gap: 18px;
            min-width: 0;
        }

        .brand-logo {
            width: 80px;
            height: 80px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #f1d5d5;
            border-radius: 20px;
            background: #fff;
            padding: 9px;
            box-shadow: 0 5px 14px rgba(143, 0, 0, 0.08);
        }

        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .brand-label {
            margin: 0;
            color: #a31616;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.16em;
        }

        .brand-title {
            margin: 0;
            color: var(--slate-900);
            font-size: 19px;
            font-weight: 700;
            letter-spacing: -0.025em;
        }

        .brand-subtitle {
            margin: 3px 0 0;
            color: var(--slate-500);
            font-size: 13px;
            font-weight: 500;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
            padding-left: 20px;
            border-left: 1px solid var(--slate-200);
        }

        .system-status {
            display: none;
            align-items: center;
            gap: 8px;
            border: 1px solid #bbf7d0;
            border-radius: 999px;
            background: #f0fdf4;
            padding: 10px 16px;
            color: #15803d;
            font-size: 14px;
            font-weight: 600;
        }

        .status-dot {
            position: relative;
            display: flex;
            width: 10px;
            height: 10px;
        }

        .status-dot-ping {
            position: absolute;
            display: inline-flex;
            width: 100%;
            height: 100%;
            border-radius: 999px;
            background: #4ade80;
            opacity: 0.6;
            animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        .status-dot-core {
            position: relative;
            display: inline-flex;
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: #22c55e;
        }

        .logout-form {
            margin: 0;
        }

        .logout-button {
            display: flex;
            align-items: center;
            gap: 8px;
            min-height: 42px;
            border: 1px solid #a31616;
            border-radius: 12px;
            background: #a31616;
            padding: 10px 13px;
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        }

        .logout-button:hover {
            border-color: #7f1010;
            background: #7f1010;
            color: #fff;
            box-shadow: 0 4px 10px rgba(143, 0, 0, 0.16);
            transform: translateY(-1px);
        }

        .logout-button:focus-visible {
            outline: 3px solid rgba(163, 22, 22, 0.24);
            outline-offset: 2px;
        }

        .logout-button svg {
            width: 20px;
            height: 20px;
            transition: transform 0.2s ease;
        }

        .logout-button:hover svg {
            transform: translateX(2px);
        }


        /* ==============================
           CONTENIDO PRINCIPAL
           ============================== */

        .main-container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 40px 24px;
        }


        /* ==============================
           TÍTULO
           ============================== */

        .intro-section {
            margin-bottom: 32px;
            animation: fadeUp 0.55s ease-out forwards;
        }

        .intro-card {
            border-radius: 24px;
            border: 1px solid var(--slate-200);
            background: #fff;
            padding: 28px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .intro-row {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .department-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }

        .department-bar {
            width: 6px;
            height: 40px;
            border-radius: 999px;
            background: var(--apch-700);
        }

        .department-label {
            margin: 0;
            color: var(--apch-700);
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.18em;
        }

        .page-title {
            margin: 0;
            color: var(--slate-900);
            font-size: 30px;
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -0.025em;
        }

        .page-description {
            max-width: 768px;
            margin: 12px 0 0;
            color: var(--slate-500);
            font-size: 16px;
            line-height: 1.75;
        }

        .records-counter {
            flex-shrink: 0;
            border: 1px solid #fee2e2;
            border-radius: 16px;
            background: var(--apch-50);
            padding: 16px 28px;
            text-align: center;
        }

        .counter-number {
            margin: 0;
            color: var(--apch-700);
            font-size: 30px;
            font-weight: 700;
        }

        .counter-label {
            margin: 4px 0 0;
            color: var(--slate-600);
            font-size: 14px;
            font-weight: 600;
        }


        /* ==============================
           MENSAJE DE ÉXITO
           ============================== */

        .success-message {
            margin-bottom: 24px;
            border: 1px solid #bbf7d0;
            border-radius: 16px;
            background: #f0fdf4;
            padding: 20px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            animation: fadeIn 0.4s ease-out forwards;
        }

        .success-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .success-icon {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #dcfce7;
            color: #16a34a;
        }

        .success-icon svg {
            width: 24px;
            height: 24px;
        }

        .success-text {
            margin: 0;
            color: #166534;
            font-size: 14px;
            font-weight: 700;
        }


        /* ==============================
           FILTROS
           ============================== */

        .filters-section {
            margin-bottom: 28px;
            overflow: hidden;
            border: 1px solid var(--slate-200);
            border-radius: 24px;
            background: #fff;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            animation: fadeUp 0.55s ease-out forwards;
        }

        .filters-header {
            border-bottom: 1px solid #fee2e2;
            background: var(--apch-50);
            padding: 24px 28px;
        }

        .filters-heading {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .section-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
        }

        .section-icon-red {
            background: var(--apch-700);
            color: #fff;
        }

        .section-icon-light {
            background: var(--apch-50);
            color: var(--apch-700);
        }

        .section-icon svg {
            width: 24px;
            height: 24px;
        }

        .section-title {
            margin: 0;
            color: var(--slate-900);
            font-size: 18px;
            font-weight: 700;
        }

        .section-subtitle {
            margin: 4px 0 0;
            color: var(--slate-500);
            font-size: 14px;
        }


        /* ==============================
           FORMULARIO DE FILTROS
           ============================== */

        .filters-form {
            padding: 28px;
        }

        .filters-grid {
            display: grid;
            gap: 20px;
        }

        .filter-label {
            display: block;
            margin-bottom: 8px;
            color: var(--slate-700);
            font-size: 14px;
            font-weight: 700;
        }

        .select-wrapper {
            position: relative;
        }

        .select-icon-left,
        .select-icon-right {
            position: absolute;
            top: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            color: var(--slate-400);
            pointer-events: none;
        }

        .select-icon-left {
            left: 0;
            padding-left: 16px;
        }

        .select-icon-right {
            right: 0;
            padding-right: 16px;
        }

        .select-icon-left svg,
        .select-icon-right svg {
            width: 20px;
            height: 20px;
        }

        .filter-select {
            width: 100%;
            height: 56px;
            appearance: none;
            border: 1px solid var(--slate-300);
            border-radius: 12px;
            background: #fff;
            padding: 0 40px 0 48px;
            color: var(--slate-700);
            font-size: 16px;
            outline: none;
            transition: all 0.2s ease;
        }

        .filter-select:focus {
            border-color: var(--apch-700);
            box-shadow: 0 0 0 4px rgba(179, 0, 0, 0.1);
        }

        .filter-buttons {
            display: flex;
            align-items: flex-end;
            gap: 12px;
        }

        .filter-button {
            height: 56px;
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 0;
            border-radius: 12px;
            background: var(--apch-700);
            padding: 0 20px;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .filter-button:hover {
            background: var(--apch-800);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
        }

        .filter-button svg {
            width: 20px;
            height: 20px;
        }

        .clear-button {
            height: 56px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--slate-200);
            border-radius: 12px;
            background: #fff;
            padding: 0 20px;
            color: var(--slate-600);
            font-size: 16px;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .clear-button:hover {
            border-color: var(--slate-300);
            background: var(--slate-50);
            color: var(--slate-900);
        }


        /* ==============================
           TABLA
           ============================== */

        .records-section {
            overflow: hidden;
            border: 1px solid var(--slate-200);
            border-radius: 24px;
            background: #fff;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            animation: fadeUp 0.55s ease-out forwards;
        }

        .records-header {
            border-bottom: 1px solid var(--slate-200);
            background: #fff;
            padding: 24px 28px;
        }

        .records-header-row {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .records-heading {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .records-count {
            border: 1px solid #fee2e2;
            border-radius: 12px;
            background: var(--apch-50);
            padding: 12px 20px;
            text-align: center;
        }

        .records-count-number {
            margin: 0;
            color: var(--apch-700);
            font-size: 20px;
            font-weight: 700;
        }

        .records-count-label {
            margin: 0;
            color: var(--slate-600);
            font-size: 12px;
            font-weight: 600;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .records-table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
        }

        .records-table thead {
            background: var(--slate-50);
        }

        .records-table th {
            border-bottom: 1px solid var(--slate-200);
            padding: 16px 24px;
            color: var(--slate-500);
            font-size: 12px;
            font-weight: 700;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .records-table tbody tr {
            transition: background-color 0.2s ease;
        }

        .records-table tbody tr:hover {
            background: rgba(255, 245, 245, 0.5);
        }

        .records-table td {
            border-bottom: 1px solid #f1f5f9;
            padding: 20px 24px;
        }

        .record-id {
            display: inline-flex;
            border-radius: 8px;
            background: var(--slate-100);
            padding: 6px 12px;
            color: var(--slate-600);
            font-size: 14px;
            font-weight: 700;
        }

        .records-table tbody tr:hover .record-id {
            background: #fff;
        }

        .user-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--apch-700);
            color: #fff;
            font-size: 14px;
            font-weight: 700;
        }

        .user-name {
            margin: 0;
            color: var(--slate-800);
            font-size: 16px;
            font-weight: 600;
        }

        .form-name {
            color: var(--slate-800);
            font-size: 16px;
            font-weight: 600;
            line-height: 1.5;
        }

        .date-cell,
        .time-cell {
            white-space: nowrap;
        }

        .date-content,
        .time-content {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--slate-600);
            font-size: 16px;
        }

        .date-content svg {
            width: 20px;
            height: 20px;
            color: var(--apch-700);
        }

        .time-content svg {
            width: 20px;
            height: 20px;
            color: var(--slate-400);
        }

        .delete-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #fecaca;
            border-radius: 12px;
            background: #fef2f2;
            padding: 10px 16px;
            color: #b91c1c;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .delete-button:hover {
            border-color: #fca5a5;
            background: #fee2e2;
        }

        .delete-button svg {
            width: 20px;
            height: 20px;
        }

        .delete-confirmation {
            width: min(440px, calc(100% - 32px));
            max-width: none;
            padding: 0;
            overflow: hidden;
            border: 1px solid var(--slate-200);
            border-radius: 24px;
            background: #fff;
            color: var(--slate-800);
            box-shadow: 0 24px 70px rgba(15, 23, 42, 0.24);
        }

        .delete-confirmation::backdrop {
            background: rgba(15, 23, 42, 0.56);
            backdrop-filter: blur(3px);
        }

        .delete-confirmation-content {
            padding: 32px;
            text-align: center;
        }

        .delete-confirmation-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #fecaca;
            border-radius: 18px;
            background: #fff1f1;
            color: var(--apch-700);
        }

        .delete-confirmation-icon svg {
            width: 28px;
            height: 28px;
        }

        .delete-confirmation-title {
            margin: 0;
            color: var(--slate-900);
            font-size: 21px;
            font-weight: 700;
            line-height: 1.35;
        }

        .delete-confirmation-message {
            margin: 10px 0 0;
            color: var(--slate-500);
            font-size: 15px;
            line-height: 1.65;
        }

        .delete-confirmation-actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 26px;
        }

        .delete-confirmation-button {
            min-height: 44px;
            padding: 0 18px;
            border: 1px solid transparent;
            border-radius: 12px;
            font: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
        }

        .delete-confirmation-cancel {
            border-color: var(--slate-200);
            background: #fff;
            color: var(--slate-700);
        }

        .delete-confirmation-cancel:hover {
            background: var(--slate-50);
            border-color: var(--slate-300);
        }

        .delete-confirmation-submit {
            background: var(--apch-700);
            color: #fff;
        }

        .delete-confirmation-submit:hover {
            background: var(--apch-800);
            transform: translateY(-1px);
        }

        .delete-confirmation-button:focus-visible {
            outline: 3px solid rgba(179, 0, 0, 0.24);
            outline-offset: 2px;
        }

        @media (max-width: 480px) {
            .delete-confirmation-content {
                padding: 28px 22px;
            }

            .delete-confirmation-actions {
                flex-direction: column-reverse;
            }

            .delete-confirmation-button {
                width: 100%;
            }
        }

        /* ==============================
           TABLA VACÍA
           ============================== */

        .empty-cell {
            padding: 64px 24px !important;
            text-align: center !important;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: var(--slate-100);
            color: var(--slate-400);
        }

        .empty-icon svg {
            width: 32px;
            height: 32px;
        }

        .empty-title {
            margin: 16px 0 0;
            color: var(--slate-600);
            font-size: 16px;
            font-weight: 700;
        }

        .empty-description {
            margin: 4px 0 0;
            color: var(--slate-400);
            font-size: 14px;
        }


        /* ==============================
           INFORMACIÓN INFERIOR
           ============================== */

        .info-section {
            margin-top: 24px;
            border: 1px solid var(--slate-200);
            border-radius: 20px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .info-content {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .info-main {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: var(--apch-50);
            color: var(--apch-700);
        }

        .info-icon svg {
            width: 20px;
            height: 20px;
        }

        .info-title {
            margin: 0;
            color: var(--slate-800);
            font-size: 14px;
            font-weight: 700;
        }

        .info-description {
            margin: 4px 0 0;
            color: var(--slate-500);
            font-size: 14px;
            line-height: 1.5;
        }

        .order-info {
            flex-shrink: 0;
            border-radius: 12px;
            background: var(--slate-50);
            padding: 12px 16px;
            color: var(--slate-500);
            font-size: 14px;
        }

        .order-value {
            color: var(--slate-700);
            font-weight: 700;
        }


        /* ==============================
           PIE DE PÁGINA
           ============================== */

        .site-footer {
            margin-top: 40px;
            background: #000;
            color: #fff;
        }

        .footer-container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 28px 24px;
        }

        .footer-main {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .footer-title {
            margin: 0;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
        }

        .footer-subtitle {
            margin: 4px 0 0;
            color: #94a3b8;
            font-size: 14px;
        }

        .footer-author {
            text-align: left;
        }

        .footer-author-name {
            margin: 0;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
        }

        .footer-author-email {
            margin: 4px 0 0;
            color: #94a3b8;
            font-size: 14px;
        }

        .footer-bottom {
            margin-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 16px;
            text-align: center;
        }

        .footer-bottom-text {
            margin: 0;
            color: #64748b;
            font-size: 12px;
        }


        /* ==============================
           RESPONSIVE
           ============================== */

        @media (min-width: 640px) {

            .brand-title {
                font-size: 19px;
            }

            .system-status {
                display: flex;
            }

            .intro-card {
                padding: 32px;
            }

            .intro-row {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }

            .page-title {
                font-size: 36px;
            }

            .page-description {
                font-size: 18px;
            }

            .records-header-row {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }

            .info-content {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }

            .footer-main {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }

            .footer-author {
                text-align: right;
            }

            .footer-bottom {
                text-align: left;
            }
        }


        @media (min-width: 768px) {

            .filters-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }


        @media (min-width: 1024px) {

            .header-inner {
                padding-left: 32px;
                padding-right: 32px;
            }

            .main-container {
                padding-left: 40px;
                padding-right: 40px;
            }

            .filters-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .footer-container {
                padding-left: 40px;
                padding-right: 40px;
            }
        }

        @media (max-width: 639px) {

            .page-header {
                border-radius: 18px;
            }

            .header-inner {
                flex-wrap: wrap;
                gap: 12px;
                min-height: 0;
                padding: 14px 14px 12px 16px;
            }

            .institution-brand {
                width: 100%;
                gap: 12px;
            }

            .brand-logo {
                width: 64px;
                height: 64px;
                padding: 8px;
                border-radius: 16px;
            }

            .brand-label {
                font-size: 9px;
            }

            .brand-title {
                font-size: 15px;
            }

            .brand-subtitle {
                margin-top: 3px;
                font-size: 10px;
            }

            .header-actions {
                width: 100%;
                justify-content: flex-end;
                padding: 10px 0 0;
                border-top: 1px solid #eef0f3;
                border-left: 0;
            }

            .logout-button {
                width: 40px;
                height: 40px;
                min-height: 40px;
                justify-content: center;
                padding: 0;
                font-size: 0;
            }
        }

    </style>

</head>


<body>


    <!-- ENCABEZADO -->

    <header class="page-header">

        <div class="header-inner">


            <!-- IDENTIDAD -->

            <div class="institution-brand">

                <div class="brand-logo">

                    <img
                        src="{{ asset('images/logo-apch.png') }}"
                        alt="Logo APCH"
                    >

                </div>


                <div>

                    <p class="brand-label">
                        APCH · DECE
                    </p>

                    <h1 class="brand-title">
                        Sistema de Formularios Digitales
                    </h1>

                    <p class="brand-subtitle">
                        Unidad Educativa "Ángel Polibio Chaves"
                    </p>

                </div>

            </div>


            <!-- SESIÓN -->

            <div class="header-actions">


                <div class="system-status">

                    <span class="status-dot">

                        <span class="status-dot-ping"></span>

                        <span class="status-dot-core"></span>

                    </span>

                    Sesión activa

                </div>


                <form
                    method="POST"
                    action="{{ route('logout') }}"
                    class="logout-form"
                >

                    @csrf

                    <button
                        type="submit"
                        class="logout-button"
                        aria-label="Cerrar sesión"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1"
                            />

                        </svg>

                        Cerrar sesión

                    </button>

                </form>

            </div>

        </div>

    </header>



    <!-- CONTENIDO -->

    <main class="main-container">


        <!-- TÍTULO -->

        <section class="intro-section">

            <div class="intro-card">

                <div class="intro-row">

                    <div>

                        <div class="department-heading">

                            <div class="department-bar"></div>

                            <p class="department-label">
                                Administración
                            </p>

                        </div>

                        <h2 class="page-title">
                            Registros de formularios
                        </h2>

                        <p class="page-description">
                            Consulte y administre los registros generados por los usuarios del sistema.
                        </p>

                    </div>


                    <!-- TOTAL -->

                    <div class="records-counter">

                        <p class="counter-number">
                            {{ $formularios->count() }}
                        </p>

                        <p class="counter-label">
                            {{ $formularios->count() == 1 ? 'Registro encontrado' : 'Registros encontrados' }}
                        </p>

                    </div>

                </div>

            </div>

        </section>



        <!-- MENSAJE DE ÉXITO -->

        @if (session('success'))

            <div class="success-message">

                <div class="success-content">

                    <div class="success-icon">

                        <svg
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            />

                        </svg>

                    </div>

                    <p class="success-text">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif



        <!-- FILTROS -->

        <section class="filters-section">


            <!-- CABECERA -->

            <div class="filters-header">

                <div class="filters-heading">

                    <div class="section-icon section-icon-red">

                        <svg
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414A1 1 0 0014 14.414V19a1 1 0 01-.553.894l-4 2A1 1 0 018 21v-6.586a1 1 0 00-.293-.707L1.293 7.293A1 1 0 011 6.586V4z"
                            />

                        </svg>

                    </div>


                    <div>

                        <h3 class="section-title">
                            Filtrar registros
                        </h3>

                        <p class="section-subtitle">
                            Seleccione los criterios que desea consultar.
                        </p>

                    </div>

                </div>

            </div>



            <!-- FORMULARIO -->

            <form
                method="GET"
                action="{{ route('formularios.registros') }}"
                class="filters-form"
            >

                <div class="filters-grid">


                    <!-- USUARIO -->

                    <div>

                        <label
                            for="usuario_id"
                            class="filter-label"
                        >
                            Usuario
                        </label>

                        <div class="select-wrapper">

                            <div class="select-icon-left">

                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />

                                </svg>

                            </div>


                            <select
                                id="usuario_id"
                                name="usuario_id"
                                class="filter-select"
                            >

                                <option value="">
                                    Todos los usuarios
                                </option>

                                @foreach ($usuarios as $usuario)

                                    <option
                                        value="{{ $usuario->id }}"
                                        {{ request('usuario_id') == $usuario->id ? 'selected' : '' }}
                                    >
                                        {{ $usuario->name }}
                                    </option>

                                @endforeach

                            </select>


                            <div class="select-icon-right">

                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />

                                </svg>

                            </div>

                        </div>

                    </div>



                    <!-- FORMULARIO -->

                    <div>

                        <label
                            for="nombre_formulario"
                            class="filter-label"
                        >
                            Tipo de formulario
                        </label>

                        <div class="select-wrapper">

                            <div class="select-icon-left">

                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                    />

                                </svg>

                            </div>


                            <select
                                id="nombre_formulario"
                                name="nombre_formulario"
                                class="filter-select"
                            >

                                <option value="">
                                    Todos los formularios
                                </option>

                                @foreach ($formulariosDisponibles as $formulario)

                                    <option
                                        value="{{ $formulario }}"
                                        {{ request('nombre_formulario') === $formulario ? 'selected' : '' }}
                                    >
                                        {{ $formulario }}
                                    </option>

                                @endforeach

                            </select>


                            <div class="select-icon-right">

                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />

                                </svg>

                            </div>

                        </div>

                    </div>



                    <!-- ORDEN -->

                    <div>

                        <label
                            for="orden"
                            class="filter-label"
                        >
                            Ordenar por fecha
                        </label>

                        <div class="select-wrapper">

                            <div class="select-icon-left">

                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 7V3m0 4a2 2 0 100 4m0-4a2 2 0 110 4m0 0v10m8-14V3m0 4a2 2 0 100 4m0-4a2 2 0 110 4m0 0v10"
                                    />

                                </svg>

                            </div>


                            <select
                                id="orden"
                                name="orden"
                                class="filter-select"
                            >

                                <option
                                    value="desc"
                                    {{ request('orden', 'desc') === 'desc' ? 'selected' : '' }}
                                >
                                    Más recientes primero
                                </option>

                                <option
                                    value="asc"
                                    {{ request('orden') === 'asc' ? 'selected' : '' }}
                                >
                                    Más antiguos primero
                                </option>

                            </select>


                            <div class="select-icon-right">

                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />

                                </svg>

                            </div>

                        </div>

                    </div>



                    <!-- BOTONES -->

                    <div class="filter-buttons">

                        <button
                            type="submit"
                            class="filter-button"
                        >

                            <svg
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414A1 1 0 0014 14.414V19a1 1 0 01-.553.894l-4 2A1 1 0 018 21v-6.586a1 1 0 00-.293-.707L1.293 7.293A1 1 0 011 6.586V4z"
                                />

                            </svg>

                            Filtrar

                        </button>


                        <a
                            href="{{ route('formularios.registros') }}"
                            class="clear-button"
                        >
                            Limpiar
                        </a>

                    </div>

                </div>

            </form>

        </section>



        <!-- TABLA -->

        <section class="records-section">


            <!-- CABECERA TABLA -->

            <div class="records-header">

                <div class="records-header-row">

                    <div class="records-heading">

                        <div class="section-icon section-icon-light">

                            <svg
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 17v-2a4 4 0 00-4-4H3m6 6v2a4 4 0 004 4h2m-6-6H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5"
                                />

                            </svg>

                        </div>


                        <div>

                            <h3 class="section-title">
                                Historial de formularios
                            </h3>

                            <p class="section-subtitle">
                                Registros almacenados en el sistema.
                            </p>

                        </div>

                    </div>


                    <div class="records-count">

                        <p class="records-count-number">
                            {{ $formularios->count() }}
                        </p>

                        <p class="records-count-label">
                            {{ $formularios->count() == 1 ? 'registro' : 'registros' }}
                        </p>

                    </div>

                </div>

            </div>



            <!-- TABLA -->

            <div class="table-wrapper">

                <table class="records-table">

                    <thead>

                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Usuario
                            </th>

                            <th>
                                Formulario
                            </th>

                            <th>
                                Fecha
                            </th>

                            <th>
                                Hora
                            </th>

                            <th>
                                Acción
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($formularios as $formulario)

                            <tr>


                                <!-- ID -->

                                <td>

                                    <span class="record-id">
                                        #{{ $formulario->id }}
                                    </span>

                                </td>


                                <!-- USUARIO -->

                                <td>

                                    <div class="user-cell">

                                        <div class="user-avatar">
                                            {{ strtoupper(substr($formulario->usuario->name, 0, 1)) }}
                                        </div>

                                        <div>

                                            <p class="user-name">
                                                {{ $formulario->usuario->name }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <!-- FORMULARIO -->

                                <td>

                                    <span class="form-name">
                                        {{ $formulario->nombre_formulario }}
                                    </span>

                                </td>


                                <!-- FECHA -->

                                <td class="date-cell">

                                    <div class="date-content">

                                        <svg
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                            />

                                        </svg>

                                        {{ $formulario->created_at->format('d/m/Y') }}

                                    </div>

                                </td>


                                <!-- HORA -->

                                <td class="time-cell">

                                    <div class="time-content">

                                        <svg
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />

                                        </svg>

                                        {{ $formulario->created_at->format('H:i') }}

                                    </div>

                                </td>


                                <!-- ACCIÓN -->

                                <td>

                                    <form
                                        method="POST"
                                        action="{{ route('formularios.eliminar', $formulario) }}"
                                        class="delete-form"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="delete-button"
                                        >

                                            <svg
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m-4 0h14"
                                                />

                                            </svg>

                                            Eliminar

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="empty-cell"
                                >

                                    <div class="empty-icon">

                                        <svg
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.7"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.707.293V19a2 2 0 01-2 2h-2z"
                                            />

                                        </svg>

                                    </div>

                                    <p class="empty-title">
                                        No existen registros para mostrar.
                                    </p>

                                    <p class="empty-description">
                                        Intente cambiar los filtros de búsqueda.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>



        <!-- INFORMACIÓN INFERIOR -->

        <section class="info-section">

            <div class="info-content">

                <div class="info-main">

                    <div class="info-icon">

                        <svg
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z"
                            />

                        </svg>

                    </div>


                    <div>

                        <p class="info-title">
                            Historial institucional
                        </p>

                        <p class="info-description">
                            Los registros corresponden a las acciones realizadas por los usuarios en los formularios del sistema.
                        </p>

                    </div>

                </div>


                <div class="order-info">

                    Orden:

                    <span class="order-value">
                        {{ request('orden', 'desc') === 'asc' ? 'Más antiguos primero' : 'Más recientes primero' }}
                    </span>

                </div>

            </div>

        </section>

    </main>



    <!-- PIE DE PÁGINA -->

    <footer class="site-footer">

        <div class="footer-container">

            <div class="footer-main">

                <div>

                    <p class="footer-title">
                        Sistema de Formularios Digitales
                    </p>

                    <p class="footer-subtitle">
                        Unidad Educativa "Ángel Polibio Chaves"
                    </p>

                </div>


                <div class="footer-author">

                    <p class="footer-author-name">
                        Desarrollado por Stalyn Alvarado
                    </p>

                    <p class="footer-author-email">
                        tu-correo@ejemplo.com
                    </p>

                </div>

            </div>


            <div class="footer-bottom">

                <p class="footer-bottom-text">
                    Departamento de Consejería Estudiantil · Sistema institucional de formularios digitales
                </p>

            </div>

        </div>

    </footer>

    <dialog
        class="delete-confirmation"
        aria-labelledby="delete-confirmation-title"
        aria-describedby="delete-confirmation-message"
    >

        <div class="delete-confirmation-content">

            <div class="delete-confirmation-icon" aria-hidden="true">

                <svg
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M12 9v3m0 4h.01M10.3 3.86L1.82 18a2 2 0 001.7 3h16.96a2 2 0 001.7-3L13.7 3.86a2 2 0 00-3.4 0z"
                    />

                </svg>

            </div>

            <h2 class="delete-confirmation-title" id="delete-confirmation-title">
                ¿Eliminar este registro?
            </h2>

            <p class="delete-confirmation-message" id="delete-confirmation-message">
                Esta acción eliminará el registro y sus documentos asociados. No se puede deshacer.
            </p>

            <div class="delete-confirmation-actions">

                <button
                    type="button"
                    class="delete-confirmation-button delete-confirmation-cancel"
                    data-delete-cancel
                >
                    Cancelar
                </button>

                <button
                    type="button"
                    class="delete-confirmation-button delete-confirmation-submit"
                    data-delete-confirm
                >
                    Sí, eliminar
                </button>

            </div>

        </div>

    </dialog>

    <script>
        const deleteConfirmation = document.querySelector('.delete-confirmation');
        const cancelDeleteButton = deleteConfirmation.querySelector('[data-delete-cancel]');
        const confirmDeleteButton = deleteConfirmation.querySelector('[data-delete-confirm]');
        let pendingDeleteForm = null;

        document.querySelectorAll('.delete-form').forEach((form) => {
            form.addEventListener('submit', (event) => {
                if (form.dataset.confirmed === 'true') {
                    delete form.dataset.confirmed;

                    return;
                }

                event.preventDefault();
                pendingDeleteForm = form;
                deleteConfirmation.showModal();
            });
        });

        cancelDeleteButton.addEventListener('click', () => {
            pendingDeleteForm = null;
            deleteConfirmation.close();
        });

        deleteConfirmation.addEventListener('cancel', () => {
            pendingDeleteForm = null;
        });

        confirmDeleteButton.addEventListener('click', () => {
            if (!pendingDeleteForm) {
                return;
            }

            const form = pendingDeleteForm;
            pendingDeleteForm = null;
            form.dataset.confirmed = 'true';
            deleteConfirmation.close();
            form.requestSubmit();
        });

        deleteConfirmation.addEventListener('click', (event) => {
            if (event.target === deleteConfirmation) {
                pendingDeleteForm = null;
                deleteConfirmation.close();
            }
        });
    </script>

</body>

</html>
