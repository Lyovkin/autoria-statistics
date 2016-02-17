@extends('layouts.base')

@section('content')
<div>
    <h2 class="page-header">AutoRia Statistics <i class="fa fa-car"></i></h2>
    <div class="col-md-12" ng-app="autoRiaApp" ng-controller="autoRiaCtrl">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-8">
                    <label for="types">Тип автомобиля</label>
                    <select class="form-control" id="types" name="types"
                            ng-model="data.IdType"
                            ng-change="getValueIdType(data.IdType)" ng-click="findObj(data.IdType)" required>
                        <option value="" selected="selected">Выберете тип авто...</option>
                        <option ng-repeat="type in types" value="[[ type.value ]]">[[ type.name ]]</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <label for="typesB">Тип кузова</label>
                    <select class="form-control" id="typesB" name="types"
                            ng-model="data.IdBody"
                            ng-change="getValueIdBody(data.IdBody)"
                            ng-disabled="data.IdType.length == null">
                        <option value="" selected="selected">Выберете тип кузова...</option>
                        <option ng-repeat="body in bodies" value="[[ body.value ]]">[[ body.name ]]</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <label for="marks">Марка автомобиля</label>
                    <select class="form-control" id="marks" name="marks"
                            ng-model="data.IdMarks"
                            ng-change="getValueIdMarks(data.IdMarks)"
                            ng-disabled="data.IdType.length == null">
                        <option value="" selected="selected">Выберете марку авто...</option>
                        <option ng-repeat="mark in marks" value="[[ mark.value ]]">[[ mark.name ]]</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <label for="models">Модель автомобиля</label>
                    <select class="form-control" id="models" name="models"
                            ng-model="data.IdModels"
                            ng-change="getValueIdModels(data.IdModels)"
                            ng-disabled="data.IdMarks.length == null">
                        <option value="" selected="selected">Выберете модель авто...</option>
                        <option ng-repeat="model in models" value="[[ model.value ]]">[[ model.name ]]</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div>
                    <h4 ng-repeat="type in ObjType" ng-show="ObjType.length > 0">Тип автомобиля: [[type.name]]</h4>
                    <h4 ng-repeat="body in ObjBody" ng-show="ObjBody.length > 0">Тип кузова: [[body.name]]</h4>
                    <h4 ng-repeat="mark in ObjMarks" ng-show="ObjMarks.length > 0">Марка автомобиля: [[mark.name]]</h4>
                    <h4 ng-repeat="model in ObjModels" ng-show="ObjModels.length > 0">Модель автомобиля: [[model.name]]</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div>
                    <pre>
                        [[result|json]]
                        [[ObjModels|json]]
                    </pre>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('js')
    <script src="/js/angular/autoRiaApp/app.js"></script>
@endsection
