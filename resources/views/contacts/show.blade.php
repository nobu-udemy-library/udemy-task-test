<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      詳細画面
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          {{-- ContactForm --}}
          <section class="text-gray-600 body-font relative">
            <div class="container px-5 mx-auto">
              <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2">
                  <div class="p-2 w-full">
                    <div class="relative">
                      <label class="leading-7 text-sm text-gray-600">氏名</label>
                      <p
                        class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        {{ $contact->name }}
                      </p>
                    </div>
                  </div>
                  <div class="p-2 w-full">
                    <div class="relative">
                      <label class="leading-7 text-sm text-gray-600">件名</label>
                      <p
                        class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        {{ $contact->title }}
                      </p>
                    </div>
                  </div>
                  <div class="p-2 w-full">
                    <div class="relative">
                      <label class="leading-7 text-sm text-gray-600">メールアドレス</label>
                      <p
                        class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        {{ $contact->email }}
                      </p>
                    </div>
                  </div>
                  @if ($contact->url)
                    <div class="p-2 w-full">
                      <div class="relative">
                        <label class="leading-7 text-sm text-gray-600">ホームページ</label>
                        <p
                          class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          {{ $contact->url }}
                        </p>
                      </div>
                    </div>
                  @endif
                  <div class="p-2 w-full">
                    <div class="relative">
                      <label class="leading-7 text-sm text-gray-600">性別</label><br>
                      <p
                        class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        {{ $gender }}
                      </p>
                    </div>
                  </div>
                  <div class="p-2 w-full">
                    <div class="relative">
                      <label class="leading-7 text-sm text-gray-600">年齢</label>
                      <p
                        class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        {{ $age }}
                      </p>
                    </div>
                  </div>
                  <div class="p-2 w-full">
                    <div class="relative">
                      <label class="leading-7 text-sm text-gray-600">お問い合わせ内容</label>
                      <p
                        class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        {{ $contact->contact }}
                      </p>
                    </div>
                  </div>
                  <form method="get" action="{{ Route('contacts.edit', ['id' => $contact->id]) }}" class="w-full">
                    <div class="p-2 w-full">
                      <button
                        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集画面へ
                      </button>
                    </div>
                  </form>
                  <form method="post" action="{{ Route('contacts.destroy', ['id' => $contact->id]) }}" class="w-full">
                    <div class="p-2 w-full mt-6 text-center">
                      <a
                        class="inline-flex mx-auto text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">削除する
                      </a>
                    </div>
                  </form>
                </div>
              </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
