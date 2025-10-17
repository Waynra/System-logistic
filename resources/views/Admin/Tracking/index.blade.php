@extends('Master.Layouts.app', ['title' => $title])

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Tracking Barang</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-gray">Tracking</li>
            <li class="breadcrumb-item active" aria-current="page">Tracking Barang</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3 class="card-title">Masukkan Kode Barang</h3>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="kode_barang" class="form-control" placeholder="Kode Barang">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary" onclick="trackBarang()">Track</button>
                    </div>
                </div>
                <div id="tracking-result" class="mt-4">
                    <!-- Data tracking akan ditampilkan di sini -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ROW -->
@endsection

@section('scripts')
<script>
    function trackBarang() {
        console.log("Button clicked");
        var kode_barang = document.getElementById('kode_barang').value;
        console.log("Kode barang:", kode_barang);

        if (kode_barang === '') {
            alert('Silakan masukkan kode barang.');
            return;
        }

        fetch("{{ route('tracking.track') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ kode_barang: kode_barang })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            var resultDiv = document.getElementById('tracking-result');
            resultDiv.innerHTML = '';

            if (data.tracking.length > 0) {
                var timeline = '<ul class="timeline">';
                data.tracking.forEach(item => {
                    timeline += `
                        <li class="timeline-item">
                            <div class="timeline-content">
                                <p><strong>Deskripsi:</strong> ${item.deskripsi}</p>
                                <p><strong>Lokasi:</strong> ${item.lokasi}</p>
                                <p><strong>Sampai Tujuan:</strong> ${item.sampai_tujuan ?? 'Belum sampai'}</p>
                                <p><strong>Waktu:</strong> ${item.created_at}</p>
                            </div>
                        </li>
                    `;
                });
                timeline += '</ul>';
                resultDiv.innerHTML = timeline;
            } else {
                resultDiv.innerHTML = '<p class="text-center">Tidak ada data pelacakan untuk kode barang ini.</p>';
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
@endsection

@section('styles')
<style>
.timeline {
    position: relative;
    padding: 20px 0;
    list-style: none;
}

.timeline:before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #C5C5C5;
    left: 50%;
    margin-left: -1.5px;
}

.timeline-item {
    padding: 20px 0;
    position: relative;
}

.timeline-item:nth-child(odd) {
    text-align: right;
}

.timeline-item:nth-child(even) {
    text-align: left;
}

.timeline-content {
    padding: 10px;
    background: #f7f7f7;
    position: relative;
    border-radius: 4px;
    display: inline-block;
    max-width: 45%;
}

.timeline-content p {
    margin: 0;
    padding: 5px 0;
}
</style>
@endsection
