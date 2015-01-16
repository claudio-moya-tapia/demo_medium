<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!--[if gte mso 9]>
            <xml>
            <x:ExcelWorkbook>
                <x:ExcelWorksheets>
                    <x:ExcelWorksheet>
                        <x:Name>Informe</x:Name>
                        <x:WorksheetOptions>
                            <x:DisplayGridlines/>
                        </x:WorksheetOptions>
                    </x:ExcelWorksheet>
                </x:ExcelWorksheets>
            </x:ExcelWorkbook>
            </xml>
            <![endif]-->
        <style>
        th{min-width: 200px; width: auto}
        </style>
    </head>
    <body>        
        <form action="http://192.168.1.49/yii/project/puc_dev/buscador/download" method="post">
            <input type="hidden" name="tabla" id="tabla" value=""/>
            <input type="submit" name="enviar" value="Enviar"/>
        </form>
        <table width="4000" id="informeExcel" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Sexo</th>
                    <th>Fuente de Ingreso</th>
                    <!-- UsuarioNatural -->
                    <th>Estado Civil</th>
                    <th>Pais</th>
                    <th>Región</th>
                    <th>Ciudad</th>
                    <th>Comuna</th>
                    <th>Direccion</th>
                    <th>Telefono fijo</th>
                    <th>Telefono celular</th>
                    <th>Email</th>
                    <!-- UsuarioLaboral -->
                    <th>Empresa</th>
                    <th>Industria</th>
                    <th>Area experiencia</th>
                    <th>Cargo</th>
                    <th>Email Comercial</th>
                    <th>Fecha ingreso</th>
                    <th>Fecha egreso</th>
                     <!-- UsuarioPregrado -->
                    <th>Institucion</th>
                    <th>Carrera</th>
                    <th>Fecha Egreso</th>
                    <th>Fecha Titulacion</th>
                    <!-- UsuarioPregrado -->
                    <th>Programa Estudio</th>
                    <th>Tipo Situacion</th>
                    <th>Tipo Estado</th>
                    <th>Fecha Matricula</th>
                    <th>Fecha Version</th>
                    
                </tr>
            </thead>
            <tbody id="informeExcelBody"></tbody>
        </table>
    </body>
</html>