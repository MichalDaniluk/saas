@if( !empty($company->id) )
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('companies.edit', $company->id) }}">Dane</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('companies.users', $company->id) }}">Użytkownicy</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('companies.permissions', $company->id)  }}">Uprawnienia</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('companies.partners.edit', $company->id)  }}">Program partnerski</a></li>
        <li class="list-group-item">Vestibulum at eros</li>
@endif
