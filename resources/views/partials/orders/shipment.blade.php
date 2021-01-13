@section('shipment')
        <div class="panel panel-default panel-default">
            <div class="panel-heading">Adres do korespondencji</div>
            <div class="panel-body">

                <form action="?s=zapisyController&akcja=PoprawAdresWysylki" method="post">
                    <input type="hidden" name="zapis_id" value="15424">
                    <div class="form-group">
                        <label for="adres" class="col-md-2 col-sm-2">Adres</label>
                        <input type="text" id="adres" name="adres" value="" class="width350">
                    </div>

                    <div class="form-group">
                        <label for="kod_pocztowy" class="col-md-2 col-sm-2">Kod pocztowy</label>
                        <input type="text" id="kod_pocztowy" name="kod_pocztowy" value="" class="width150">
                    </div>

                    <div class="form-group">
                        <label for="miejscowosc" class="col-md-2 col-sm-2">Miejscowość</label>
                        <input type="text" id="miejscowosc" name="miejscowosc" value="" class="width350">
                    </div>

                    <div class="form-check">
                        <label for="odbior_osobisty" class="col-md-2 col-sm-2">Odbiór osobisty</label>
                        <input type="checkbox" name="odbior_osobisty" >
                    </div><br>

                    <div class="form-check">
                        <label for="odbior_osobisty" class="col-md-2 col-sm-2">Gotowe do wysyłki</label>
                        <input type="checkbox" name="gotowe" >
                    </div><br>

                    <div class="form-check">
                        <label for="czeka" class="col-md-2 col-sm-2">Czeka</label>
                        <input type="checkbox" name="czeka" >
                    </div><br>

                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-2"></label>
                        <input type="submit" value="zapisz" class="btn btn-primary">


                    </div>

                </form>

            </div>
        </div><div class="panel panel-default panel-success">
            <div class="panel-heading">Wysyłka dokumentów</div>
            <div class="panel-body">

                <form action="?s=zapisy_zaswiadczenie&zapis_id=15424" method="post">

                    <input type="hidden" name="zapis_id" value="15424">
                    <input type="hidden" name="szkolenie_id" value="10510">
                    <input type="hidden" name="kursant_id" value="12975">

                    <div class="form-group">
                        <label for="data_wysylki" class="col-md-2 col-sm-2">Data wysyłki</label>
                        <input type="text" name="data_wysylki" id="data_wysylki" value="2020-12-05">
                    </div>

                    <div class="form-group">
                        <label for="data_wysylki" class="col-md-2 col-sm-2">Nie wysyłaj maila</label>
                        <input type="checkbox" name="wysylka_nomail">
                    </div>


                </form>
                <table class="table table-striped">
                    <tr>
                        <th>Data wysyłki</th>
                        <th></th>
                    </tr>

                </table>

                <script>

                    function WysylkaUsun( wysylka )
                    {
                        if( confirm('Czy chcesz usunąć wysyłkę') )
                        {
                            axios.get('?s=wysylka_usun', {
                                params: {
                                    wysylka_id: wysylka,
                                    ajax: 1
                                }
                            })
                                .then(function (response) {

                                    if( response.data == 'OK' )
                                    {
                                        document.getElementById(wysylka).style.display = 'none';
                                    }
                                    else
                                    {
                                        alert('Nie można usunąć pozycji. Błąd: ' + response.data);
                                    }
                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                        };
                    }

                </script>
            </div>
        </div>
@endsection
