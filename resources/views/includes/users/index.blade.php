@if (count($all_user_data) > 0)
    @forelse ($all_user_data as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
                <a href="{{ route('users.show', $item->id) }}" style="text-decoration:none; color:#7b7f90">{{ $item->name }}</a>
            </td>
            <td>
                <div class="rounded-circle">
                    {{-- @if ($item->get_country_name->name == 'France')
                        <img src="{{ asset('uploads/country_flug/france.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Bangladesh')
                        <img src="{{ asset('uploads/country_flug/bangladesh.png') }}" width="30" height="30" alt="1">
                    @endif --}}

                    @if ($item->get_country_name->name == 'France')
                        <img src="{{ asset('uploads/country_flug/france.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Bangladesh')
                        <img src="{{ asset('uploads/country_flug/bangladesh.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'United Kingdom')
                        <img src="{{ asset('uploads/country_flug/uk.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'United States')
                        <img src="{{ asset('uploads/country_flug/us.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Afghanistan')
                        <img src="{{ asset('uploads/country_flug/afghanistan.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Angola')
                        <img src="{{ asset('uploads/country_flug/angola.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Albania')
                        <img src="{{ asset('uploads/country_flug/albania.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Antigua And Barbuda')
                        <img src="{{ asset('uploads/country_flug/antigua_and_barbuda.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Algeria')
                        <img src="{{ asset('uploads/country_flug/algeria.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Armenia')
                        <img src="{{ asset('uploads/country_flug/armenia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Aruba')
                        <img src="{{ asset('uploads/country_flug/aruba.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Argentina')
                        <img src="{{ asset('uploads/country_flug/argentina.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Australia')
                        <img src="{{ asset('uploads/country_flug/australia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Austria')
                        <img src="{{ asset('uploads/country_flug/austria.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Azerbaijan')
                        <img src="{{ asset('uploads/country_flug/azerbaijan.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Belgiam')
                        <img src="{{ asset('uploads/country_flug/belgium.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Bahamas')
                        <img src="{{ asset('uploads/country_flug/bahamas.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Bahrain')
                        <img src="{{ asset('uploads/country_flug/bahrain.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Barbados')
                        <img src="{{ asset('uploads/country_flug/barbados.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Belarus')
                        <img src="{{ asset('uploads/country_flug/belarus.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Beliz')
                        <img src="{{ asset('uploads/country_flug/beliz.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Benin')
                        <img src="{{ asset('uploads/country_flug/benin.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Bermuda')
                        <img src="{{ asset('uploads/country_flug/bermuda.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Bosnia And Herzegovina')
                        <img src="{{ asset('uploads/country_flug/bosnia_and_herzegovina.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Botswana')
                        <img src="{{ asset('uploads/country_flug/botswana.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Bolivia')
                        <img src="{{ asset('uploads/country_flug/bolivia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Bhutan')
                        <img src="{{ asset('uploads/country_flug/bhutan.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Brunai')
                        <img src="{{ asset('uploads/country_flug/brunai.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Bulgeria')
                        <img src="{{ asset('uploads/country_flug/bulgeria.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Burkina Faso')
                        <img src="{{ asset('uploads/country_flug/burkina_faso.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Burundi')
                        <img src="{{ asset('uploads/country_flug/burundi.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Brazil')
                        <img src="{{ asset('uploads/country_flug/brazil.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'China')
                        <img src="{{ asset('uploads/country_flug/china.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Canada')
                        <img src="{{ asset('uploads/country_flug/canada.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Chile')
                        <img src="{{ asset('uploads/country_flug/chile.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Colombia')
                        <img src="{{ asset('uploads/country_flug/colombia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Croatia')
                        <img src="{{ asset('uploads/country_flug/croatia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Cameroon')
                        <img src="{{ asset('uploads/country_flug/cameroon.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Cape Verde')
                        <img src="{{ asset('uploads/country_flug/cape_verde.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Central African Republic')
                        <img src="{{ asset('uploads/country_flug/central_african_republic.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Chad')
                        <img src="{{ asset('uploads/country_flug/chad.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Costa Rica')
                        <img src="{{ asset('uploads/country_flug/costa_rica.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Colombia')
                        <img src="{{ asset('uploads/country_flug/colombia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Combodia')
                        <img src="{{ asset('uploads/country_flug/combodia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Comoros')
                        <img src="{{ asset('uploads/country_flug/comoros.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Congo')
                        <img src="{{ asset('uploads/country_flug/congo.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Cuba')
                        <img src="{{ asset('uploads/country_flug/cuba.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Cyprus')
                        <img src="{{ asset('uploads/country_flug/cyprus.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Czech Republic')
                        <img src="{{ asset('uploads/country_flug/czech_republic.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Denmark')
                        <img src="{{ asset('uploads/country_flug/denmark.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Djibouti')
                        <img src="{{ asset('uploads/country_flug/djibuti.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Dominica')
                        <img src="{{ asset('uploads/country_flug/dominica.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Dominican Republic')
                        <img src="{{ asset('uploads/country_flug/dominican_republic.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Egypt')
                        <img src="{{ asset('uploads/country_flug/egypt.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Ecuador')
                        <img src="{{ asset('uploads/country_flug/equador.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Equatorial Guinea')
                        <img src="{{ asset('uploads/country_flug/equatorial_guinea.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Eritrea')
                        <img src="{{ asset('uploads/country_flug/eritrea.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Estonia')
                        <img src="{{ asset('uploads/country_flug/estonia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Ethiopia')
                        <img src="{{ asset('uploads/country_flug/ehiopia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'El Salvador')
                        <img src="{{ asset('uploads/country_flug/el_salvador.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Finland')
                        <img src="{{ asset('uploads/country_flug/finland.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Falkland Islands')
                        <img src="{{ asset('uploads/country_flug/falkland_islands.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Faroe Islands')
                        <img src="{{ asset('uploads/country_flug/faroe_islands.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Fiji')
                        <img src="{{ asset('uploads/country_flug/fiji.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'French Guiana')
                        <img src="{{ asset('uploads/country_flug/french_guiana.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Germany')
                        <img src="{{ asset('uploads/country_flug/germany.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Ghana')
                        <img src="{{ asset('uploads/country_flug/ghana.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Greece')
                        <img src="{{ asset('uploads/country_flug/greece.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Gabon')
                        <img src="{{ asset('uploads/country_flug/gabon.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Gambia')
                        <img src="{{ asset('uploads/country_flug/gambia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Georgia')
                        <img src="{{ asset('uploads/country_flug/georgia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Gibraltar')
                        <img src="{{ asset('uploads/country_flug/gibraltar.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Greenland')
                        <img src="{{ asset('uploads/country_flug/greenland.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Grenada')
                        <img src="{{ asset('uploads/country_flug/grenada.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Guatemala')
                        <img src="{{ asset('uploads/country_flug/guatemala.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Guinea')
                        <img src="{{ asset('uploads/country_flug/guinea.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Guinea Bissau')
                        <img src="{{ asset('uploads/country_flug/guinea_bissau.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Guyana Bissau')
                        <img src="{{ asset('uploads/country_flug/guyana.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Hong Kong')
                        <img src="{{ asset('uploads/country_flug/hong_kong.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Hungary')
                        <img src="{{ asset('uploads/country_flug/hungary.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Haiti')
                        <img src="{{ asset('uploads/country_flug/haiti.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Honduras')
                        <img src="{{ asset('uploads/country_flug/honduras.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Indonesia')
                        <img src="{{ asset('uploads/country_flug/indonesia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Iceland')
                        <img src="{{ asset('uploads/country_flug/iceland.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'India')
                        <img src="{{ asset('uploads/country_flug/india.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Iran')
                        <img src="{{ asset('uploads/country_flug/iran.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Iraq')
                        <img src="{{ asset('uploads/country_flug/iraq.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Italy')
                        <img src="{{ asset('uploads/country_flug/italy.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Israel')
                        <img src="{{ asset('uploads/country_flug/israel.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Ivory Coast')
                        <img src="{{ asset('uploads/country_flug/ivory_coast.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Ireland')
                        <img src="{{ asset('uploads/country_flug/ireland.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Japan')
                        <img src="{{ asset('uploads/country_flug/japan.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Jamaica')
                        <img src="{{ asset('uploads/country_flug/jamaica.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Jordan')
                        <img src="{{ asset('uploads/country_flug/jordan.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Jersey')
                        <img src="{{ asset('uploads/country_flug/jersey.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Kuwait')
                        <img src="{{ asset('uploads/country_flug/kuwait.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Kenya')
                        <img src="{{ asset('uploads/country_flug/kenya.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Kazakhstan')
                        <img src="{{ asset('uploads/country_flug/kazakhstan.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Kiribat')
                        <img src="{{ asset('uploads/country_flug/kiribat.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Kosovo')
                        <img src="{{ asset('uploads/country_flug/kosovo.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Kyrgyzstan')
                        <img src="{{ asset('uploads/country_flug/kyrgyzstan.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Malaysia')
                            <img src="{{ asset('uploads/country_flug/malaysia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Laos')
                        <img src="{{ asset('uploads/country_flug/laos.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Latvia')
                        <img src="{{ asset('uploads/country_flug/latvia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Lebanon')
                        <img src="{{ asset('uploads/country_flug/lebanon.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Lesotho')
                        <img src="{{ asset('uploads/country_flug/lesotho.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Liberia')
                        <img src="{{ asset('uploads/country_flug/liberia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Lithunia')
                        <img src="{{ asset('uploads/country_flug/lithunia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Luxembourge')
                        <img src="{{ asset('uploads/country_flug/luxembourge.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Libya')
                        <img src="{{ asset('uploads/country_flug/libya.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Mexico')
                        <img src="{{ asset('uploads/country_flug/mexico.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Macao')
                        <img src="{{ asset('uploads/country_flug/macao.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Macedonia')
                        <img src="{{ asset('uploads/country_flug/macedonia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Madagascar')
                        <img src="{{ asset('uploads/country_flug/madagascar.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Malaysia')
                        <img src="{{ asset('uploads/country_flug/malaysia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Maldives')
                        <img src="{{ asset('uploads/country_flug/maldives.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Mali')
                        <img src="{{ asset('uploads/country_flug/mali.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Malta')
                        <img src="{{ asset('uploads/country_flug/malta.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Mauritania')
                        <img src="{{ asset('uploads/country_flug/mauritania.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Mauritus')
                        <img src="{{ asset('uploads/country_flug/mauritas.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Moldava')
                        <img src="{{ asset('uploads/country_flug/moldava.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Mongolia')
                        <img src="{{ asset('uploads/country_flug/mongolia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Montenegro')
                        <img src="{{ asset('uploads/country_flug/montenegro.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Morocco')
                        <img src="{{ asset('uploads/country_flug/morocco.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Monaco')
                        <img src="{{ asset('uploads/country_flug/monaco.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Mozambique')
                        <img src="{{ asset('uploads/country_flug/mozambique.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Myanmar')
                        <img src="{{ asset('uploads/country_flug/myanmar.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Norway')
                        <img src="{{ asset('uploads/country_flug/norway.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Nomibia')
                        <img src="{{ asset('uploads/country_flug/nomibia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Nepal')
                        <img src="{{ asset('uploads/country_flug/nepal.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Nicaragua')
                        <img src="{{ asset('uploads/country_flug/nicaragua.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Niger')
                        <img src="{{ asset('uploads/country_flug/niger.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Nigeria')
                        <img src="{{ asset('uploads/country_flug/nigeria.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Nepal')
                        <img src="{{ asset('uploads/country_flug/nepal.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'North Korea')
                        <img src="{{ asset('uploads/country_flug/north_korea.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Norway')
                        <img src="{{ asset('uploads/country_flug/norway.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Oman')
                        <img src="{{ asset('uploads/country_flug/oman.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'New Zealands')
                        <img src="{{ asset('uploads/country_flug/new_zealands.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Netherlands')
                        <img src="{{ asset('uploads/country_flug/netherlands.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Portugal')
                        <img src="{{ asset('uploads/country_flug/portugal.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Pakistan')
                        <img src="{{ asset('uploads/country_flug/pakistan.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Palestine')
                        <img src="{{ asset('uploads/country_flug/palestine.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Panama')
                        <img src="{{ asset('uploads/country_flug/panama.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Papua New Guinea')
                        <img src="{{ asset('uploads/country_flug/papua_new_guinea.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Paraguay')
                        <img src="{{ asset('uploads/country_flug/paraguay.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Peru')
                        <img src="{{ asset('uploads/country_flug/peru.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Philipines')
                        <img src="{{ asset('uploads/country_flug/philipines.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Poland')
                        <img src="{{ asset('uploads/country_flug/poland.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Qatar')
                        <img src="{{ asset('uploads/country_flug/qatar.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Russia')
                        <img src="{{ asset('uploads/country_flug/russia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Romania')
                        <img src="{{ asset('uploads/country_flug/romania.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Saudi Arabia')
                        <img src="{{ asset('uploads/country_flug/saudi_arabia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Singapore')
                        <img src="{{ asset('uploads/country_flug/singapore.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'South Africa')
                        <img src="{{ asset('uploads/country_flug/south_africa.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'South Korea')
                        <img src="{{ asset('uploads/country_flug/south_korea.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Spain')
                        <img src="{{ asset('uploads/country_flug/spain.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Sweden')
                        <img src="{{ asset('uploads/country_flug/sweden.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Saint Kitts And Nevis')
                        <img src="{{ asset('uploads/country_flug/saint_kitts_and_nevis.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Saint Martin')
                        <img src="{{ asset('uploads/country_flug/saint_martin.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Saint Lucia')
                        <img src="{{ asset('uploads/country_flug/saint_lucia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Switzerland')
                        <img src="{{ asset('uploads/country_flug/switzerland.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Senegal')
                        <img src="{{ asset('uploads/country_flug/senegal.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Serbia')
                        <img src="{{ asset('uploads/country_flug/serbia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Sierra Leone')
                        <img src="{{ asset('uploads/country_flug/sierra_leone.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Slovakia')
                        <img src="{{ asset('uploads/country_flug/slovakia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Slovenia')
                        <img src="{{ asset('uploads/country_flug/slovenia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Somalia')
                        <img src="{{ asset('uploads/country_flug/somalia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Sudan')
                        <img src="{{ asset('uploads/country_flug/sudan.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Sri Lanka')
                        <img src="{{ asset('uploads/country_flug/sri_lanka.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Swaziland')
                        <img src="{{ asset('uploads/country_flug/swaziland.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Syria')
                        <img src="{{ asset('uploads/country_flug/syria.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Taiwan')
                        <img src="{{ asset('uploads/country_flug/taiwan.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Tanzania')
                        <img src="{{ asset('uploads/country_flug/tanzania.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Tajikistan')
                        <img src="{{ asset('uploads/country_flug/tajikistan.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Trinidad And Tobago')
                        <img src="{{ asset('uploads/country_flug/trinidad_and_tobago.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Togo')
                        <img src="{{ asset('uploads/country_flug/togo.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Tunisia')
                        <img src="{{ asset('uploads/country_flug/thailand.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Thailand')
                        <img src="{{ asset('uploads/country_flug/tunisia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Turkmenistan')
                        <img src="{{ asset('uploads/country_flug/turkmenistan.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Turkey')
                        <img src="{{ asset('uploads/country_flug/turkey.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'United Arab Amirat')
                        <img src="{{ asset('uploads/country_flug/uae.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Uganda')
                        <img src="{{ asset('uploads/country_flug/uganda.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Ukraine')
                        <img src="{{ asset('uploads/country_flug/ukraine.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Uruguay')
                        <img src="{{ asset('uploads/country_flug/uruguay.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Uzbekistan')
                        <img src="{{ asset('uploads/country_flug/uzbekistan.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Vatican City')
                        <img src="{{ asset('uploads/country_flug/vatican_city.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Venezuela')
                        <img src="{{ asset('uploads/country_flug/venezuela.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Vietnam')
                        <img src="{{ asset('uploads/country_flug/vietnam.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Western Sahara')
                        <img src="{{ asset('uploads/country_flug/western_sahara.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Yemen')
                        <img src="{{ asset('uploads/country_flug/yemen.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Zambia')
                        <img src="{{ asset('uploads/country_flug/zambia.png') }}" width="30" height="30" alt="1">
                    @elseif($item->get_country_name->name == 'Zimbabwe Sahara')
                        <img src="{{ asset('uploads/country_flug/zimbabwe.png') }}" width="30" height="30" alt="1">
                    @endif

                </div>
            </td>
            {{-- <td>{{ $item->get_country_name->name }}</td> --}}
            <td>{{ $item->getRole->role ?? '' }}</td>
            {{-- <td>{{ $item->email ?? '' }}</td> --}}
            <td>{{ $item->created_at->Format('d-M-Y') }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('users.show', $item->id) }}" style="cursor: pointer"> <i class="fa-solid fa-eye"></i> {{ __('Show') }} </a></li>
                        <li><a class="dropdown-item" data-bs-toggle='modal' data-bs-target='#updateUser{{ $item->id }}' style="cursor: pointer"> <i class="fa-solid fa-edit"></i> {{ __('Edit') }}</a></li>
                        <li>
                            @if($item->role_id == 1)
                            
                            @else
                                <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#deleteUsers{{ $item->id }}" style="cursor: pointer"> <i class="fa-solid fa-trash"></i> {{ __('Delete') }} </a>
                            @endif

                        </li>

                    </ul>

                </div>
            </td>

        </tr>

        {{-- modal for delete data --}}
        <div class="modal fade" id="deleteUsers{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0 modal_header">
                        <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Delete User') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>{{ __('Are You Sure?') }}</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('No') }}</button>
                        <form action="{{ route('users.destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!--=====MODAL FOR UPDATE USER=====-->
        <div class="modal fade" id="updateUser{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 modal_header">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Update User') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.update', $item->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group mt-2">
                        <label class="form-label">{{ __('Name') }} <span class="text-danger"> *</span></label>
                        <input type="text" name="name" class="form-control" value="{{ $item->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="form-group mt-2">
                        <label class="form-label">{{ __('Phone') }}</label>
                        <input type="text" name="phone" class="form-control" value="{{ $item->phone }}">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label class="form-label">{{ __('Email') }} <span class="text-danger"> *</span></label>
                            <input type="email" name="email" class="form-control" value="{{ $item->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="value" class="col-form-label">{{ __('Role') }}</label>

                            <select name="role_id" id="role_id_for_update_user" class="form-control">
                                <option value="">--{{ __('Select One') }}--</option>

                                @foreach ($user_role_data as $user_role_item)
                                <option value="{{ $user_role_item->id }}" {{ $user_role_item->id == $item->role_id ? 'selected' : '' }} >{{ $user_role_item->role }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        @php
                            $selected_permission = json_decode($item->permission);
                        @endphp
                        <div>
                            @include('includes.user_update_role')
                        </div>
                        @error('permission')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button  type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
    @empty
        <tr><td colspan="4"> <h3 class="text-center text-danger">{{ __('No Data Available Here!') }}</h3></td></tr>
    @endforelse
    @endif