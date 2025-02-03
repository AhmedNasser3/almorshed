@extends('admin.master')
@section('AdminContent')
<div class="admin_container" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<div class="notify">
    <div class="notify_container">
        <div class="notify_content">
            <div class="notify_data">
                <div class="notify_title_cn">
                    <div class="notify_title">
                        <h2>قائمة SEO</h2>
                        <p> &nbsp; ادارة SEO الموقع &nbsp;</p>
                    </div>
                    <div class="notify_btn">
                        <button><a href="{{ route('seo.create') }}">انشيئ SEO جديد</a></button>
                    </div>
                </div>
                <div class="notify_table">
                    <table>
                        <tr class="tr_head">
                            <th>رقم</th>
                            <th>ID</th>
                            <th>عنوان ال SEO</th>
                            <th>كلمات مفتاحية للموقع</th>
                            <th>التاريخ</th>
                            <th>اعدادات</th>
                            <th>حذف</th>
                        </tr>
                        @foreach ($seos as $key => $seo)
                        <tr class="tr_body">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $seo->id }}</td>
                            <td>{{ $seo->meta_description }}</td>
                            <td>{{ $seo->meta_keywords }}</td>
                            <td>{{ \Carbon\Carbon::parse($seo->created_at)->translatedFormat('l، d F Y') }}</td>
                            <td ><i style="cursor: pointer" class="fa-solid fa-gear"></i></td>
                            <td>
                                <form action="{{ route('seo.delete',['seoId' => $seo->id]) }}" method="post">
                                    @csrf
                                    <a href="{{ route('seo.delete',['seoId' => $seo->id]) }}"><i style="color: #7e2020" class="fa-solid fa-trash"></i></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
