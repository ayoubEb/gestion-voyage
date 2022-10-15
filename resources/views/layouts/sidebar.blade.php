        <!-- ========== Left Sidebar Start ========== -->
              <!-- ========== Left Sidebar Start ========== -->
              <div class="vertical-menu dark">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                    <div class="user-profile text-center mt-3">
                        <div class="">
                            <img src="{{ public_path('assets/images/user/avatar-1.jpg')}}" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1">
                              @if (isset(Auth::user()->name))
                              {{ Auth::user()->name }}
                              @endif
                            </h4>
                            <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
                        </div>
                    </div>

                    <div id="sidebar-menu">
                      <!-- Left Menu Start -->
                      <ul class="metismenu list-unstyled" id="side-menu">
                        <li>
                          <a href="{{ route('home') }}" class="waves-effect">
                            <i class="mdi mdi-home-variant-outline"></i>
                            <span>Dashboard</span>
                          </a>
                        </li>
                        <li>
                          <a href="javascript: void(0);" class="has-arrow waves-effect">
                              <i class="ri-mail-send-line"></i>
                              <span>Catalogue</span>
                          </a>
                          <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('activite.index') }}">Thémes</a></li>
                            <li><a href="{{ route('theme-activite.index') }}">Thémes & Activités</a></li>
                            <li><a href="{{ route('attribut.index') }}">Attributs</a></li>
                            <li><a href="{{ route('hotel.index') }}">Hôtels</a></li>
                            <li><a href="{{ route('permi.index') }}">Permis</a></li>
                          </ul>
                        </li>

                        <li>
                          <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-mail-send-line"></i>
                            <span>Ges.Employés</span>
                          </a>
                          <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('employe.index') }}">Employés</a></li>
                            <li><a href="{{ route('employe-salaire.index') }}">Salaires</a></li>
                            <li><a href="{{ route('employe-salaire.ft') }}">Fiche technique S.A</a></li>
                            <li><a href="{{ route('interieur') }}">Intérieur</a></li>
                            <li><a href="{{ route('vehicule') }}">Véhicules</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-mail-send-line"></i>
                            <span>Ges.Utilisateurs</span>
                          </a>
                          <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('user.index') }}">Utilisateurs</a></li>
                            <li><a href="{{ route('user-salaire.index') }}">Salaires</a></li>
                            <li><a href="{{ route('user-salaire.ft') }}">Fiche technique S.A</a></li>
                            {{-- <li><a href="{{ route('user-salaire.index') }}">Carte du travail</a></li> --}}
                          </ul>
                        </li>
                        <li>
                          <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-mail-send-line"></i>
                            <span>Ges.Véhicules</span>
                          </a>
                          <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('transport.index') }}">Transport</a></li>
                            {{-- <li><a href="{{ route('bateau.index') }}">Bateaux</a></li> --}}
                          </ul>
                        </li>
                        <li>
                          <a href="{{ route('agence.index') }}" class="waves-effect">
                            <i class="mdi mdi-home-variant-outline"></i>
                            <span>Agences</span>
                          </a>
                        </li>

                        <li>
                          <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-home-variant-outline"></i>
                            <span>Voyages</span>
                          </a>
                        </li>
                        <li>
                          <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-home-variant-outline"></i>
                            <span>Agence d'utilisateurs</span>
                          </a>
                        </li>
                        <li>
                          <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-home-variant-outline"></i>
                            <span>Clients</span>
                          </a>
                        </li>
                        <li>
                          <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-home-variant-outline"></i>
                            <span>Reservations</span>
                          </a>
                        </li>
                        <li>
                          <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-home-variant-outline"></i>
                            <span>Contactez</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->


      <!-- Left Sidebar End -->


