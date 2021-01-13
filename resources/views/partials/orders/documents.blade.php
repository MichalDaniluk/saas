@section('documents')
        <a name="legitka"></a>
        <form action="?s=legitymacja-zapisz" method="post">

            <input type="hidden" name="zapis_id" value="15424">
            <input type="hidden" id="kursant_id" name="kursant_id" value="12975"><div class="form-row"><div class="form-group col-md-12">
                    <label for="nr_legitymacji">Nr legitymacji</label>
                    <input style="width:50%" class="form-control" type="text" id="nr_legitymacji" name="nr_legitymacji" value="">

                    <label for="nr_legitymacji_bur">Nr legitymacji BUR</label>
                    <input style="width:50%" class="form-control" type="text" id="nr_legitymacji_bur" name="nr_legitymacji_bur" value=""><br>

                    <span onclick="ZapiszNrLegitymacji('15424')" class="btn btn-primary">zapisz</span><br>				</div><div class="form-group col-md-12">
                    <label for="specjalizacja">Specjalizacja</label>
                    <input style="width:50%" class="form-control" type="text" name="specjalizacja" value="Narciarstwo zjazdowe" list="specjalizacja">

                </div>

                <div class="form-group col-md-12">
                    <label for="specjalizacja_en">Specjalizacja (EN)</label>
                    <input style="width:50%" class="form-control" type="text" name="specjalizacja_en" value="" list="specjalizacja_en">

                </div>

                <div class="form-group col-md-12">
                    <label for="stopien">Stopień</label>
                    <input style="width:50%" class="form-control" type="text" name="stopien" value="">
                </div>

                <div class="form-group col-md-12">
                    <label for="stopien_en">Stopień (EN)</label>
                    <input style="width:50%" class="form-control" type="text" name="stopien_en" value="">
                </div>

                <div class="form-group col-md-12">
                    <label for="wymiar_godzin">Wymiar godzin</label>
                    <input style="width:50%" class="form-control" type="text" name="wymiar_godzin" id="wymiar_godzin" value="">
                </div>

                <div class="form-group col-md-12">
                    <label for="miejscowosc_legitka">Miejscowość kursu/szkolenia</label>
                    <input style="width:50%" class="form-control" type="text" name="miejscowosc_legitka" value="Wisła">
                </div>

                <div class="form-group col-md-12">
                    <label for="data_urodzenia">Data urodzenia</label>
                    <input style="width:50%" class="form-control" type="text" name="data_urodzenia" value="">
                </div>

                <div class="form-group col-md-12">
                    <label for="data_legitka">Data wydania dok.</label>
                    <input style="width:50%" class="form-control" type="text" name="data_legitka" id="data_legitka" value="">
                </div>

                <div class="form-group col-md-12">
                    <label for="data_egzaminu">Data egzaminu</label>
                    <input style="width:50%" class="form-control" type="text" name="data_egzaminu" id="data_egzaminu" value="">
                </div>

                <div class="form-group col-md-12">
                    <label for="data_egzaminu">Szkoła / Placówka</label>
                    <input style="width:50%" class="form-control" type="text" name="placowka" id="placowka" value="">
                </div>

                <div class="form-group col-md-12">
                    <label for="data_egzaminu">Nr zbiorczy</label>
                    <input style="width:50%" class="form-control" type="text" name="nr_zbiorczy" id="nr_zbiorczy" value="">
                </div>

                <div class="form-check">
                    &nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="checkbox" name="instruktor" id="instruktor" >
                    <label class="form-check-label" for="data_egzaminu">Instruktor</label>
                </div>

                <div class="form-group">
                    <label for="submit" class="col-md-12">&nbsp;</label>
                    <input type="submit" value="zapisz" class="btn btn-primary">
                    <a class="btn btn-success" target="_blank" href="?s=legitka&kursant_id=12975&zapis_id=15424&st=1&ajax">Awers</a>
                    <a class="btn btn-success" target="_blank" href="?s=legitka&kursant_id=12975&zapis_id=15424&st=2&ajax">Rewers</a>

                    <a class="btn btn-success" target="_blank" href="?s=legitka&kursant_id=12975&zapis_id=15424&st=1&ajax&t=tren">Awers TRENER</a>
                    <a class="btn btn-success" target="_blank" href="?s=legitka&kursant_id=12975&zapis_id=15424&st=2&ajax&t=tren">Rewers TRENER</a>
                    <a class="btn btn-success" target="_blank" href="?s=zas_oswiata&kursant_id=12975&zapis_id=15424&ajax">Zaśw. oświata</a>
                    <a class="btn btn-success" target="_blank" href="?s=zas_firma&kursant_id=12975&zapis_id=15424&ajax">Zaśw. firma</a>
                    <a class="btn btn-success" target="_blank" href="?s=zas_kwww&kursant_id=12975&zapis_id=15424&typ=WW&ajax">Zaśw. KW/WW</a>
                    <a class="btn btn-success" target="_blank" href="?s=certyfikat&kursant_id=12975&zapis_id=15424&typ=zas_szkolenie&ajax">Zaśw.</a>
                    <a class="btn btn-success" target="_blank" href="?s=zas_przetargi&kursant_id=12975&zapis_id=15424&ajax">Zaśw. przet.</a>
                    <a class="btn btn-success" target="_blank" href="?s=zas_medactive&kursant_id=12975&zapis_id=15424&ajax">Zaśw. MedActive</a>
                    <a class="btn btn-success" target="_blank" href="?s=certyfikat&kursant_id=12975&zapis_id=15424&typ=trenerski&ajax">Certyfikat TRENER</a>
                    <a class="btn btn-success" target="_blank" href="?s=certyfikat_instruktorski&kursant_id=12975&zapis_id=15424&ajax">Certyfikat</a>
                    <a class="btn btn-success" target="_blank" href="?s=dyplom&kursant_id=12975&zapis_id=15424&ajax">Dyplom</a>
                    <a class="btn btn-success" target="_blank" href="?s=dyplom_medactive&kursant_id=12975&zapis_id=15424&ajax">Dyplom MedActive</a>
                    <a class="btn btn-success" target="_blank" href="?s=zaswiadczenie_bur&kursant_id=12975&zapis_id=15424&ajax">Zaśw.BUR</a>


                </div></div></form>
@endsection
