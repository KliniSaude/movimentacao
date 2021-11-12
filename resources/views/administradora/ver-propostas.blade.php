@extends('layout.main')
@section('content')
<div class="container py-5">

  <a href="{{ url()->previous() }}" class="btn btn-klini-secondary btn-lg text-white"><i class="fas fa-arrow-left"></i> voltar</a>
  <a href="{{ route('admin.create.proposta') }}" class="btn btn-klini-primary btn-lg text-white"><i class="fas fa-plus"></i> cadastrar nova proposta</a>

  <form action="../classes/Selects.php" method="post">
    <div class="row mt-5">
      <div class="col-md-2">
        <label class="form-label">Mês da compêtencia</label>
        <input type="month" class="form-control mb-3" id="mes_competencia">
      </div>
      <div class="col-md-3">
        <label class="form-label">Entidade</label>
        <select class="form-select" aria-label="Escolha uma opção">
          <option selected></option>
          <option value=""></option>
        </select>
      </div>
      <div class="col-md-2">
        <label class="form-label">Vigência</label>
        <select class="form-select" aria-label="Escolha uma opção">
          <option selected></option>
          <option value=""></option>
        </select>

      </div>
      <div class="col-md-2">
        <label class="form-label">Status</label>
        <select class="form-select" name="status" aria-label="Escolha uma opção">
          <option selected></option>
          <option value=""></option>
        </select>
      </div>
      <div class="col-md-2 d-flex align-items-center">
        <button type="submit" class="btn btn-klini-primary text-white mt-3"><i class="fas fa-search"></i> Buscar</button>
      </div>
    </div>
  </form>

  <div class="row mt-5">
    <div class="col md-3">
      <button type="button" class="btn btn-klini-secondary btn-lg text-white" id="exportar_propostas"><i
          class="fas fa-cloud-download-alt"></i> exportar propostas selecionadas</button>
    </div>
  </div>
  <div class="row">
    <div class="alert alert-dismissible fade" role="alert" id="alertMessage">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">#ID</th>
            <th scope="col">NOME</th>
            <th scope="col">CPF</th>
            <th scope="col">ENTIDADE</th>
            <th scope="col">VIGÊNCIA</th>
            <th scope="col">STATUS</th>
            <th scope="col">Editar/Excluir</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($proposals as $proposal)
            <tr>
              <th scope="row">
                <input class="form-check-input export_selected" type="checkbox" value="" name="" id="">
              </th>
              <th scope="row">{{ $proposal->id }}</th>
              <td>{{ $proposal->nome_associado }}</td>
              <td>{{ $proposal->cpf }}</td>
              <td>{{ $proposal->contrato }}</td>
              <td>{{ $proposal->data }}</td>
              @if ($proposal->statusID == 5)
              <td><a class="btn bg-warning text-white" href="" data-bs-toggle="modal" data-bs-target="#exampleModal" role="button">{{ $proposal->status }}</a></td>
              @else
              <td>{{ $proposal->status }}</td>
              @endif
              <td>
                <a class="btn btn-klini-primary text-white" href="" role="button"><i class="fas fa-edit"></i></a>
                <a class="btn bg-danger text-white" id="delete" data-delete="" role="button"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Correções a serem feitas:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" disabled>iaraiaraiara</textarea>
          <label for="floatingTextarea2">Correções</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-klini-secondary text-white" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
@endsection