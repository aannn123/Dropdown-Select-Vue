@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Tambah Wilayah') }}
                       
                    <div class="card" style="margin-top: 10px" id="test">
                        <div class="card-body">
                            
                            <form action="{{route('home.post')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Provinsi</label>
                                    <select @change="selectProvinsi"  v-model="state.selectProvinsi" name="provinsi" class="form-control">
                                        <option disabled value="">Pilih Provinsi</option>
                                        <option  v-for="item in provinsi" :key="item.id" :value="item.id">@{{item.name}}</option>
                                    </select>
                                <span>@{{state.selectProvinsi}}</span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kota</label>
                                    <select @change="selectKota" v-model="state.selectKota" name="kota" class="form-control">
                                        <option disabled value="">Pilih Kota</option>
                                        <option  v-for="item in kota" :key="item.id" :value="item.id">@{{item.name}}</option>
                                      </select>
                                    <span>@{{state.selectKota}}</span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kecamatan</label>
                                    <select @change="selectKecamatan" v-model="state.selectKecamatan" name="kecamatan" class="form-control">
                                        <option disabled value="">Pilih Kecamatan</option>
                                        <option  v-for="item in kecamatan" :key="item.id" :value="item.id">@{{item.name}}</option>
                                      </select>
                                    <span>@{{state.selectKecamatan}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kelurahan</label>
                                    <select v-model="state.selectKelurahan" name="kelurahan" class="form-control">
                                        <option disabled value="">Pilih Kelurahan</option>
                                        <option  v-for="item in kelurahan" :key="item.id" :value="item.name">@{{item.name}}</option>
                                      </select>
                                    <span>@{{state.selectKelurahan}}</span>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                           
                           
                        </div>
                      </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#test',
            data: {
                message: 'Hello Vue!',
                state: {
                    selectProvinsi: '',
                    selectKota: '',
                    selectKecamatan: '',
                    selectKelurahan: '',
                },
                provinsi: [],
                kota: [],
                kecamatan: [],
                kelurahan: []
            },
            methods: {
                selectProvinsi() {
                    // this.state.selectKota = '';
                    const params = {
                        provinsi: this.state.selectProvinsi
                    }

                    axios
                        .get(`https://x.rajaapi.com/MeP7c5neZ0andiQWYQLvxIVz0HeNjLVIE4bb7vGQPzUo1IfbK5tdyaob1w/m/wilayah/kabupaten?idpropinsi=${params.provinsi}`)
                        .then(res => (this.kota = res.data.data))
                        // .then(res => console.log(res.data.data))
                        .catch(err => console.log(err))
                },
                
                selectKota() {
                    // this.state.selectKecamatan = '';
                    const params = {
                        kota: this.state.selectKota
                    }

                    axios
                        .get(`https://x.rajaapi.com/MeP7c5neZ0andiQWYQLvxIVz0HeNjLVIE4bb7vGQPzUo1IfbK5tdyaob1w/m/wilayah/kecamatan?idkabupaten=${params.kota}`)
                        .then(res => (this.kecamatan = res.data.data))
                        // .then(res => console.log(res.data.data))
                        .catch(err => console.log(err))
                },

                selectKecamatan() {
                    // this.state.selectKelurahan = '';
                    const params = {
                        kecamatan: this.state.selectKecamatan
                    }

                    axios
                        .get(`https://x.rajaapi.com/MeP7c5neZ0andiQWYQLvxIVz0HeNjLVIE4bb7vGQPzUo1IfbK5tdyaob1w/m/wilayah/kelurahan?idkecamatan=${params.kecamatan}`)
                        .then(res => (this.kelurahan = res.data.data))
                        // .then(res => console.log(res.data.data))
                        .catch(err => console.log(err))
                }
            },
            mounted() {
                axios
                    .get("https://x.rajaapi.com/MeP7c5neZ0andiQWYQLvxIVz0HeNjLVIE4bb7vGQPzUo1IfbK5tdyaob1w/m/wilayah/provinsi")
                    // .then(res => console.log(res.data.data))
                    .then(res => (this.provinsi = res.data.data))
                    .catch(err => console.log(err))
                
            
                // axios
                // .get("https://x.rajaapi.com/MeP7c5neZ0andiQWYQLvxIVz0HeNjLVIE4bb7vGQPzUo1IfbK5tdyaob1w/m/wilayah/kabupaten?idpropinsi=32")
                // // .then(res => console.log(res.data.data.name))
                // .then(res => (this.kota = res.data.data))
                // .catch(err => console.log(err))
            
                // axios
                // .get("https://x.rajaapi.com/MeP7c5neZ0andiQWYQLvxIVz0HeNjLVIE4bb7vGQPzUo1IfbK5tdyaob1w/m/wilayah/kecamatan?idkabupaten=3216")
                // // .then(res => console.log(res.data.data.name))
                // .then(res => (this.kecamatan = res.data.data))
                // .catch(err => console.log(err))

                // axios
                // .get("https://x.rajaapi.com/MeP7c5neZ0andiQWYQLvxIVz0HeNjLVIE4bb7vGQPzUo1IfbK5tdyaob1w/m/wilayah/kelurahan?idkecamatan=3216081")
                // // .then(res => console.log(res.data.data.name))
                // .then(res => (this.kelurahan = res.data.data))
                // .catch(err => console.log(err))
            },
        })
    </script>
@endpush
