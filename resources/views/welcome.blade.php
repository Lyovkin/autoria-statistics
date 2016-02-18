@extends('layouts.base')

@section('content')
<div>
    <h2 class="page-header">AutoRia Statistics <i class="fa fa-car"></i></h2>
    <div class="col-md-12" ng-app="autoRiaApp" ng-controller="autoRiaCtrl">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-10">
                    <label for="types">Тип автомобиля</label>
                    <select class="form-control" id="types" name="types"
                            ng-model="data.IdType"
                            ng-change="getValueIdType(data.IdType)" ng-click="findObj(data.IdType)" required>
                        <option value="" selected="selected">Выберете тип авто...</option>
                        <option ng-repeat="type in types" value="[[ type.value ]]">[[ type.name ]]</option>
                    </select>
                </div>
                <div class="col-md-10">
                    <label for="typesB">Тип кузова</label>
                    <select class="form-control" id="typesB" name="types"
                            ng-model="data.IdBody"
                            ng-change="getValueIdBody(data.IdBody)"
                            ng-disabled="data.IdType.length == null">
                        <option value="" selected="selected">Выберете тип кузова...</option>
                        <option ng-repeat="body in bodies" value="[[ body.value ]]">[[ body.name ]]</option>
                    </select>
                </div>
                <div class="col-md-10">
                    <label for="marks">Марка автомобиля</label>
                    <select class="form-control" id="marks" name="marks"
                            ng-model="data.IdMarks"
                            ng-change="getValueIdMarks(data.IdMarks)"
                            ng-disabled="data.IdType.length == null">
                        <option value="" selected="selected">Выберете марку авто...</option>
                        <option ng-repeat="mark in marks" value="[[ mark.value ]]">[[ mark.name ]]</option>
                    </select>
                </div>
                <div class="col-md-10">
                    <label for="models">Модель автомобиля</label>
                    <select class="form-control" id="models" name="models"
                            ng-model="data.IdModels"
                            ng-change="getValueIdModels(data.IdModels)"
                            ng-disabled="data.IdMarks.length == null">
                        <option value="" selected="selected">Выберете модель авто...</option>
                        <option ng-repeat="model in models" value="[[ model.value ]]">[[ model.name ]]</option>
                    </select>
                </div>
                <form name="yearInput">
                    <div class="col-md-10">
                        <label for="year">Год выпуска автомобиля</label>
                        <input class="form-control" type="number" id="year" name="year" ng-model="year" required
                               min="1950" max="2016" placeholder="2010" ng-disabled="data.IdModels.length == null">
                        <span class="help-block" ng-show="yearInput.year.$error.required">Введите год</span>
                        <span class="help-block" ng-show="yearInput.year.$error.max">Год должен быть меньше чем 2016г.</span>
                        <span class="help-block" ng-show="yearInput.year.$error.min">Год должен быть больше чем 1950г.</span>
                    </div>

                </form>

            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div>
                    <h4 ng-repeat="type in ObjType" ng-show="ObjType.length > 0">Тип автомобиля: [[type.name]]</h4>
                    <h4 ng-repeat="body in ObjBody" ng-show="ObjBody.length > 0">Тип кузова: [[body.name]]</h4>
                    <h4 ng-repeat="mark in ObjMarks" ng-show="ObjMarks.length > 0">Марка автомобиля: [[mark.name]]</h4>
                    <h4 ng-repeat="model in ObjModels" ng-show="ObjModels.length > 0">Модель автомобиля: [[model.name]]</h4>
                    <h4 ng-show="year != null">Год выпуска автомобиля: [[year]]</h4>
                    <hr ng-show="result.total != null">
                    <h4 ng-show="result.total != null">Найдено автомобилей: [[result.total]]</h4>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div>
                    <canvas id="doughnut" class="chart chart-doughnut"
                            chart-data="data" chart-labels="labels">
                    </canvas>
                    <h4 ng-show="nonAuto != null">[[nonAuto]]</h4>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('js')
    <script src="/js/angular/autoRiaApp/app.js"></script>
@endsection
