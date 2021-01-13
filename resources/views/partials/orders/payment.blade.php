@section('payment')
        <div class="panel panel-default panel-success">
            <div class="panel-heading">Wpłaty, należność za kurs: 990.00 zł, brak/nadwyżka: 990 zł</div>
            <div class="panel-body">
                <div class="form-row">

                    <div class="form-group col-md-12">
                        <input type="checkbox" name="togle" id="togle" class="form-check-input">
                        <label for="togle" class="form-check-label">Nowa wpłata</label>
                    </div>

                </div>

                <div id="form_wplaty" style="display:none">
                    <form action="?s=wplataController&akcja=DodajWplate" method="post">

                        <input type="hidden" name="zapis_id" value="15424">
                        <input type="hidden" name="szkolenie_id" value="10510">
                        <input type="hidden" name="kursant_id" value="12975">
                        <input type="hidden" name="kurs_id" value="5">
                        <input type="hidden" name="termin_id" value="10527">

                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="wplata">Kwota wpłaty</label>
                                <input type="text" name="wplata" value="" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="data_wplaty">Data wpłaty</label>
                                <input type="text" name="data_wplaty" id="data_wplaty" value="2020-12-05" class="form-control">
                            </div>

                            <div class="form-group col-mod-4">
                                <label for="bez_maila" class="form-check-label">Nie wysyłaj maila</label><br>
                                <input type="checkbox" name="bez_maila" class="form-check-input">
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="uwaga_wplaty">Uwagi</label>
                                <textarea name="uwaga_wplaty" class="form-control" rows="3"></textarea>
                            </div>

                        </div>

                        <div class="form-row col-md-12">

                            <div class="form-group">
                                <label for="data_zwrotu"></label>
                                <input type="submit" value="Dodaj wpłatę" class="btn btn-success">
                            </div>

                        </div>

                    </form>
                </div>

                <script>

                    $(document).ready(function()
                    {

                        $('#togle').change(function()
                        {
                            if( $('#togle').is(':checked') === false )
                            {
                                $('#form_wplaty').hide();
                            }
                            else
                            {
                                $('#form_wplaty').show();
                            }
                        });

                        $( "#data_wplaty" ).datepicker({ dateFormat: 'yy-mm-dd' });
                    });

                </script>﻿
                <table class="table table-striped">
                    <tr>
                        <th>Data wpłaty</th>
                        <th>Kwota</th>
                        <th>Uwagi</th>
                        <th>Dodał wpłatę</th>
                        <th>Czas dodania wpłaty</th>
                        <th></th>
                    </tr>
                    <tr>
                    <tr>
                        <td><strong>Suma wpłat</strong></td>
                        <td><strong>0zł</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>					</div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Faktury</div>
            <div class="panel-body">

                <form id="fv_form">

                    <input type="hidden" id="zapis_id" name="zapis_id" value="15424">

                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <input type="checkbox" name="fv" id="fv" value="" class="form-check-input" >
                            <label for="fv" class="form-check-label">Wystawić fakturę (fv_no) </label>
                        </div>

                    </div>

                    <div id="body">

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="fv_nazwa">Nazwa odbiorcy lub imię i nazwisko</label>
                                <input type="text" name="fv_nazwa" id="fv_nazwa" value="" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="fv_nip">NIP</label>
                                <input type="text" name="fv_nip" id="fv_nip" value="" class="form-control">
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-5">
                                <label for="fv_ulica">Ulica</label>
                                <input type="text" id="fv_ulica" name="fv_ulica" value="" class="form-control">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="fv_kod">Kod pocztowy</label>
                                <input type="text" id="fv_kod" name="fv_kod" class="form-control" value="">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="fv_miejscowosc">Miejscowość</label>
                                <input type="text" id="fv_miejscowosc" name="fv_miejscowosc" value="" class="form-control">
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="fv_nr">Nr faktury</label>
                                <input type="text" name="fv_nr" id="fv_nr" value="" class="form-control">
                            </div>

                        </div>


                        <div class="form_row">

                            <div class="form-group col-md-5">
                                <input type="checkbox" name="fv_dostarczona" id="fv_dostarczona" value="" class="form-check-input" >
                                <label for="fv_dostarczona" class="form-check-label">Faktura dostarczona</label>
                            </div>

                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <span class="btn btn-success" onclick="Zapisz()">Zapisz</span>
                        </div>
                    </div>



                </form>

            </div>
        </div>

        <div class="panel panel-default panel-danger">
            <div class="panel-heading">Zwroty</div>
            <div class="panel-body">
                ﻿<div class="form-row">

                    <div class="form-group col-md-12">
                        <input type="checkbox" name="togle_zwrot" id="togle_zwrot" class="form-check-input">
                        <label for="togle_zwrot" class="form-check-label">Nowy zwrot</label>
                    </div>

                </div>

                <div id="form_zwroty" style="display:none">
                    <form action="?s=zwrotController&akcja=DodajZwrot" method="post">

                        <input type="hidden" name="zapis_id" value="15424">
                        <input type="hidden" name="szkolenie_id" value="10510">
                        <input type="hidden" name="kursant_id" value="12975">


                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="zwrot">Kwota zwrotu</label>
                                <input type="text" name="zwrot" value="" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="data_zwrotu">Data zwrotu</label>
                                <input type="text" name="data_zwrotu" id="data_zwrotu" value="2020-12-05" class="form-control">
                            </div>

                            <div class="form-group col-mod-4">
                                <label for="bez_maila" class="form-check-label">Nie wysyłaj maila</label><br>
                                <input type="checkbox" name="bez_maila" class="form-check-input">
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="uwagi">Uwagi</label>
                                <textarea name="uwagi" class="form-control" rows="3"></textarea>
                            </div>

                        </div>

                        <div class="form-row col-md-12">

                            <div class="form-group">
                                <label for=""></label>
                                <input type="submit" value="Dodaj zwrot" class="btn btn-success">
                            </div>

                        </div>

                    </form>
                </div>

                <table class="table table-striped">
                    <tr>
                        <th>Data zwrotu</th>
                        <th>Kwota</th>
                        <th>Uwagi</th>
                        <th>Dodał zwrot</th>
                        <th>Data dodania zwrotu</th>
                        <th></th>
                    </tr>
                    <tr>
                    <tr><td><strong>Suma zwrotów</strong></td><td><strong>0zł</strong></td><td></td></tr>
                    </tr>
                </table>					</div>
        </div>

@endsection
