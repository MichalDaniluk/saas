@section('data')
        <form action="?s=zapisyedycja&zapis_id=15424" method="post">

            <input type="hidden" name="skad" value="">
            <input type="hidden" name="zapis_id" value="15424">
            <input type="hidden" id="szkolenie_id" name="szkolenie_id" value="10510">

            <input type="hidden" id="szkolenie_id_old" name="szkolenie_id_old" value="10510">
            <input type="hidden" id="termin_id_old" name="termin_id_old" value="10527">
            <input type="hidden" id="kurs_id_old" name="kurs_id_old" value="5">
            <input type="hidden" id="kursant_id" name="kursant_id" value="12975">
            <input type="hidden" id="status_old" name="status_old" value="Aktywny">
            <input type="hidden" id="termin_id_nowy" name="termin_id_nowy" value="0">


            <div class="panel panel-default panel-success">
                <div class="panel-heading">Data i czas zapisu: 2020-12-05 13:49, zapis z <strong>ckks.pl</strong></div>
                <div class="panel-body">

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="kod_partnera">Kod partnera</label>
                            <input class="form-control" type="text" name="kod_partnera" value="ckks">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="kod_promocyjny">Kod promocyjny</label>
                            <input class="form-control" type="text" name="kod_promocyjny" value="44-164">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="imie_nazwisko">Imie i nazwisko</label>
                            <input class="form-control" required type="text" id="imie_nazwisko" name="imie_nazwisko" value="Marek Jakóbik"readonly>
                            <span class="btn btn-warning" onclick="$('#imie_nazwisko').prop('readonly', false);">edycja</span>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="telefon">Telefon</label>
                            <input class="form-control" type="text" id="telefon" name="telefon" value="570271109"readonly>
                            <span class="btn btn-warning"onclick="$('#telefon').prop('readonly', false);">edycja</span>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" id="email" name="email" value="mjakobik53@gmail.com"readonly>
                            <span class="btn btn-warning"onclick="$('#email').prop('readonly', false);">edycja</span>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="uwagi">Uwagi kursanta</label>
                            <textarea class="form-control" name="uwagi" rows="3" disabled></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="uwagi">Uwagi CKKS</label>
                            <textarea class="form-control" name="uwagi_ckks" rows="3"></textarea>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="email">Nr konta</label>
                            <input class="form-control" type="text" id="nrkonta" name="nrkonta" value="">
                        </div>

                    </div>

                </div>
            </div>
        </form>
@endsection
