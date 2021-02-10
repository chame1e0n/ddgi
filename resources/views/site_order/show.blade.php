@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Номер заказа</th>
                                        <td>{{$order->order_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Наименование Продукта</th>
                                        <td>{{$order->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Объект страхования</th>
                                        <td>{{$order->object_title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Статус заказа</th>
                                        <td>{{$order->status}}</td>
                                    </tr>
                                    <tr>
                                        <th>Стоимость (UZS)</th>
                                        <td>{{$order->amount}}</td>
                                    </tr>
                                    <tr>
                                        <th>Премия</th>
                                        <td>{{$order->prize}}</td>
                                    </tr>
                                    <tr>
                                        <th>Дата оформлении</th>
                                        <td>{{$order->timestamp}}</td>
                                    </tr>
                                    <tr>
                                        <th>Дата окончании полиса</th>
                                        <td>{{$order->term}}</td>
                                    </tr>
                                    <tr>
                                        <th>Номер кадастра</th>
                                        <td>{{$order->inventory_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Общ. площадь</th>
                                        <td>{{$order->total_area}}</td>
                                    </tr>
                                    <tr>
                                        <th>Улица/Квартал</th>
                                        <td>{{$order->street}}</td>
                                    </tr>
                                    <tr>
                                        <th>Город имущество</th>
                                        <td>{{$order->city_property}}</td>
                                    </tr>
                                    <tr>
                                        <th>Вид имущества</th>
                                        <td>{{$order->type_property}}</td>
                                    </tr>
                                    <tr>
                                        <th>Совпадает с адресом постоянной регистрации</th>
                                        <td>{{$order->matches_registration_address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Имя пользователя</th>
                                        <td>{{$order->username}}</td>
                                    </tr>
                                    <tr>
                                        <th>Имя</th>
                                        <td>{{$order->first_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Фамилия</th>
                                        <td>{{$order->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Отчество</th>
                                        <td>{{$order->middle_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Активный пользователь?</th>
                                        <td>{{$order->is_active ? 'Да' : 'Нет'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Аватар</th>
                                        <td><img src="{{$order->avatar}}" height="120" width="120"> </td>
                                    </tr>
                                    <tr>
                                        <th>Дата Рождения Пользователя</th>
                                        <td>{{$order->birth_day}}</td>
                                    </tr>
                                    <tr>
                                        <th>Серия Паспорта</th>
                                        <td>{{$order->serial_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Номер Паспорта</th>
                                        <td>{{$order->passport_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Дата выдачи паспорта</th>
                                        <td>{{$order->data_issue}}</td>
                                    </tr>
                                    <tr>
                                        <th>Кем выдан (паспорт)</th>
                                        <td>{{$order->issued_by}}</td>
                                    </tr>
                                    <tr>
                                        <th>Номер телефона</th>
                                        <td>{{$order->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Индекс почты</th>
                                        <td>{{$order->email_index}}</td>
                                    </tr>
                                    <tr>
                                        <th>Область/Город</th>
                                        <td>{{$order->city}}</td>
                                    </tr>
                                    <tr>
                                        <th>Район</th>
                                        <td>{{$order->district}}</td>
                                    </tr>
                                    <tr>
                                        <th>Улица/Квартал</th>
                                        <td>{{$order->user_street}}</td>
                                    </tr>
                                    <tr>
                                        <th>Номер дома</th>
                                        <td>{{$order->apartment_number}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.content -->
@endsection