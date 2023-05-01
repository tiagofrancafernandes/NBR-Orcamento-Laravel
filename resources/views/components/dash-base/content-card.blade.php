<div>

    @if ($headline ?? null)
    <div class="headline">
        <h3>
            @if ($icon ?? null)
                <i class="icon-{{ $icon ?? null }}"></i>
            @endif

            {{ $headline ?? null }}
        </h3>
    </div>
    @endif
    <div class="content">
        <!-- Chart -->
        <div class="chart">
            <div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
                class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand"
                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div
                        style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                    </div>
                </div>
                <div class="chartjs-size-monitor-shrink"
                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:200%;height:200%;left:0; top:0">
                    </div>
                </div>
            </div>
            <div>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
