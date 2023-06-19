@extends('layouts.app')

@section('content')
<x-header title="Semua Transaksi" showCreate="true" link="api/transactions/create" />
@include('layouts.session')
<table class="table table-index table-striped table-hover m-2">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Judul</th>
            <th>Anggaran</th>
            <th>Metode Pembayaran</th>
            <th>Kategori</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($transactions as $transaction)
        <tr class="href-row" data-link="{{ url('api/transactions/show', $transaction->id) }}">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $transaction->title }}</td>
            <td>{{ $transaction->budget->title }}</td>
            <td>{{ $transaction->paymentOption->title }}</td>
            <td>{{ $transaction->category->title }}</td>
            <td class="format-amount" data-amount="{{ $transaction->amount }}"></td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Tidak ada catatan ditemukan</td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="ml-2 float-right">
    {{ $transactions->links() }}
</div>
@endsection

@section('script')
<script src="{{ asset('js/accounting.min.js') }}"></script>
@endsection