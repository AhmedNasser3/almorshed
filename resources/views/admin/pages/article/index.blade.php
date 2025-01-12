@extends('admin.master')

@section('AdminContent')
<div class="admin_container" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <div class="notify">
        <div class="notify_container">
            <div class="notify_content">
                <div class="notify_data">
                    <div class="notify_title_cn">
                        <div class="notify_title">
                            <h2>قائمة المقالات</h2>
                            <p> &nbsp; إدارة مقالات الموقع &nbsp;</p>
                        </div>
                        <div class="notify_btn">
                            <button><a href="{{ route('articles.create') }}">إنشاء مقال جديد</a></button>
                        </div>
                    </div>
                    <div class="notify_table">
                        <div class="table_wrapper">
                            <table>
                                <tr class="tr_head">
                                    <th>رقم</th>
                                    <th>ID</th>
                                    <th>العنوان</th>
                                    <th>العنوان الفرعي</th>
                                    <th>الوصف التعريفي</th>
                                    <th>صورة</th>
                                    <th>فيديو</th>
                                    <th>رابط الفيديو</th>
                                    <th>الملفات</th>
                                    <th>المنشئ</th>
                                    <th>الحالة</th>
                                    <th>النص البديل</th>
                                    <th>الإعدادات</th>
                                    <th>مسح</th>
                                </tr>
                                @foreach ($articles as $key => $article)
                                <tr class="tr_body">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->title ?? '<span style="color: gray;">لا يوجد</span>' }}</td>
                                    <td>
                                        @php
                                        // تقسيم النص إلى كلمات باستخدام الفراغ
                                        $words = explode(' ', $article->subtitle ?? '');
                                            // استخراج أول ثلاث كلمات فقط
                                            $firstThreeWords = implode(' ', array_slice($words, 0, 3));
                                        @endphp

                                        {!! $firstThreeWords ?: '<span style="color: gray;">لا يوجد</span>' !!}
                                    </td>
                                    <td>
                                        @php
                                            // تقسيم النص إلى كلمات باستخدام الفراغ
                                            $words = explode(' ', $article->meta_description ?? '');
                                            // استخراج أول ثلاث كلمات فقط
                                            $firstThreeWords = implode(' ', array_slice($words, 0, 3));
                                        @endphp

                                        {!! $firstThreeWords ?: '<span style="color: gray;">لا يوجد</span>' !!}
                                    </td>
                                                              <td><img src="{{ asset('storage/'.$article->image) }}" alt="image" style="width: 50px; height: 50px;"></td>
                                    <td>
                                        @if($article->video)
                                            <a href="{{ asset('storage/'.$article->video) }}" target="_blank">شاهد الفيديو</a>
                                            @else
                                            <span style="color: gray;">لا يوجد فيديو</span>
                                        @endif
                                    </td>
                                    <td style="color: rgb(29, 82, 143); text-decoration: rgb(51, 158, 201);">
                                        @if($article->video_link)
                                            <a href="{{ $article->video_link }}" target="_blank" style="color: rgb(29, 82, 143); text-decoration: none;">
                                                {{ $article->video_link }}
                                            </a>
                                        @else
                                        <span style="color: gray;">لا يوجد</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($article->files)
                                            <ul>
                                                @foreach(json_decode($article->files) as $file)
                                                <li><a href="{{ asset('storage/'.$file) }}" target="_blank">تحميل الملف</a></li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span style="color: gray;">لا يوجد ملفات</span>
                                            @endif
                                        </td>
                                        <td>{{ $article->author ?? '<span style="color: gray;">لا يوجد</span>' }}</td>
                                        <td style="color:{{$article->status == 'published' ? 'green' : ($article->status == 'archived' ? 'gray' : 'blue')}}">
                                        {{ $article->status == 'published' ? 'منشور' : ($article->status == 'archived' ? 'مؤرشف' : 'مسودة') }}
                                    </td>
                                    <td>{{ $article->alt ?? '<span style="color: gray;">لا يوجد</span>' }}</td>
                                    <td><i style="cursor: pointer" class="fa-solid fa-gear"></i></td>
                                    <td>
                                        <form action="{{ route('articles.delete',['articleId' => $article->id])}}" method="post">
                                            @csrf
                                            <a href="{{ route('articles.delete',['articleId' => $article->id])}}"><i style="color: #7e2020" class="fa-solid fa-trash"></i></a>
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
</div>
    @endsection
