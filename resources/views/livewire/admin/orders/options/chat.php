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
                            <div class="chat-msg {{ $msg->message_from == auth()->id() ? 'owner' : 'rtl:flex-row-reverse' }}" wire:key="conversation-message-{{ $msg->uid }}">
                                <div class="chat-msg-profile">
                                    <img class="chat-msg-img object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ src($msg->sender->avatar) }}" alt="{{ $msg->sender->username }}" />
                                    <div class="chat-msg-date">{{ format_date($msg->created_at, 'Y-m-d h:i:s') }}</div>
                                </div>
                                <div class="chat-msg-content">
                                    <div class="chat-msg-text">
                     

                                         <?php
                                        $msg->message  = str_replace("&lt;","<", $msg->message);
                                        $msg->message  = str_replace("&gt;",">", $msg->message);
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