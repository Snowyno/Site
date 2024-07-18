<div class="container" x-data="window.WbHObCwPcNqueuQ" x-init="init()" s>
    <div class="rounded-md shadow-sm border border-gray-100 dark:border-zinc-700 chat-menor">

        {{-- Section header --}}
        <div class="header py-3 px-5">
                
            {{-- Section title --}}
            <div class="">
                <span class="text-sm font-semibold tracking-wide text-gray-700 dark:text-gray-100">{{ __('messages.t_messages') }}</span>
            </div>

            {{-- My Profile --}}
            <div class="user-settings rtl:!mr-auto rtl:!ml-[unset]">
                


              Clique no nome do usuário para ver os dados
            </div>

        </div>

        {{-- Section content --}}
        <div class="wrapper !grid md:!flex" >


            {{-- Conversation messages --}}
            <div style="display: flex;flex-direction: column;flex-grow: 1;">
            <div class="chat-area" id="chat-area">
                <div class="chat-area-header"></div>
                <div class="chat-area-main">

                    @if (count($messages))

                        {{-- Pages --}}
                        @if ($messages->hasPages())
                            <div class="flex justify-center py-6">
                                {!! $messages->links('pagination::tailwind') !!}
                            </div>
                        @endif

                        {{-- Messages --}}
                        @foreach ($messages->reverse() as $msg)

                            <?php
                                $all_blacklistedwords = $this->blacklistwords->toArray();
                            ?>
                            <div class="chat-msg {{ $msg->message_from == auth()->id() ? 'owner' : 'rtl:flex-row-reverse' }}" wire:key="conversation-message-{{ $msg->uid }}">
                                <div class="chat-msg-profile">
                                    <img class="chat-msg-img object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ src($msg->sender->avatar) }}" alt="{{ $msg->sender->username }}" />
                                    <small>
                                        <a href="https://p2win.com.br/dashboard/users/details/<?php echo $msg->sender->uid; ?>">
                                            <b>User:</b><?php echo  $msg->sender->username; ?>
                                        </a>
                                    </small>

                                    <div class="chat-msg-date"><?php echo format_date($msg->created_at, 'Y-m-d h:i:s'); ?></div>
                                </div>
                                <div class="chat-msg-content">
                                    <div class="chat-msg-text">
                     

                                         <?php
                                        $msg->message  = str_replace("&lt;","<", $msg->message);
                                        $msg->message  = str_replace("&gt;",">", $msg->message);
                                    
                                        //TROCA AS BLACKLISTED WORDS

                                        foreach($all_blacklistedwords as $blws){
                                            if($msg->message <> ""){
                                                if (str_contains($msg->message, $blws->palvra)) {
                                                    $msg->message = "<span style='color: red;'>".$msg->message."</span>";
                                                    
                                                }
                                            }

                                        }

                                        echo $msg->message;
                                        ?>


                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else

                        {{-- No messages yet --}}
                        <div class="py-14 px-6 text-center text-sm sm:px-14">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            <p class="mt-4 font-semibold text-gray-900 dark:text-gray-200">{{ __('messages.t_no_messages_yet') }}</p>
                            <p class="mt-2 text-gray-500 dark:text-gray-400">{{ __('messages.t_no_messages_yet_subtitle') }}</p>
                        </div>

                    @endif
                    
                </div>

            </div>

 
            </div>

        </div>
        
    </div>
</div>

@push('scripts')

    {{-- AlpineJs --}}
    <script>
        function WbHObCwPcNqueuQ() {
            return {

                init() {
                    var _this = this;

                    // Listen when livewire event received
                    document.addEventListener("DOMContentLoaded", () => {

                        _this.scrollDown();

                        Livewire.hook('message.processed', (message, component) => {
                            _this.scrollDown();
                        })
                    });

                },

                scrollDown() {
                    var target = document.getElementById("chat-area");
                    target.scrollTop = target.scrollHeight;
                }

            }
        }
        window.WbHObCwPcNqueuQ = WbHObCwPcNqueuQ();
    </script>

@endpush

@push('styles')
    
    {{-- Chat style --}}
    <link rel="stylesheet" href="{{ url('public/css/chat.css') }}">

@endpush