@section('emails')
        <div id="listamailowa">

            <input type="hidden" name="mailowa_od" id="mailowa_od" value="michal.daniluk@ckks.pl">
            <input type="hidden" name="mailowa_email" id="mailowa_email" value="mjakobik53@gmail.com">
            <input type="hidden" name="mailowa_zapis_id" id="mailowa_zapis_id" value="15424">

            <div class="form-row">

                <div class="form-group col-md-12">
                    <label for="">Tytuł</label>
                    <input type="text" name="mailowa_tytul" id="mailowa_tytul" class="form-control">
                </div>

                <div class="form-group col-md-12">
                    <label for="">Treść wiadomości</label>
                    <textarea name="mailowa_tresc" id="mailowa_tresc" rows="5" class="form-control"></textarea>
                </div>

                <div class="form-group col-md-12">
                    <button class="btn btn-primary">Wyślij wiadomość</button>
                </div>

            </div>

            <table class="table table-striped">
                <tr>
                    <th>Lp.</th>
                    <th>Wysłano</th>
                    <th>Tytuł</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a target="_blank" href="'?s=pokazmaila&id=' + item.newsletter_wysylka_id"></a></td>
                </tr>
            </table>

        </div>
@endsection
