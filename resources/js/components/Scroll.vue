<!--     <template>
        <div class="template-scroll">
            <div class="container-scroll" animate>
        FILMO FILMO FILMO FILMO FILMO FILMO FILMO FILMO
    </div>
    <div class="container-scroll" style="color: #ead2ac9d;" animate>
        FILMO FILMO FILMO FILMO FILMO FILMO FILMO FILMO
    </div>
        </div>

    <div class="container" animate>
        FILMO FILMO FILMO FILMO FILMO FILMO FILMO FILMO
    </div>
    <div class="container" style="color: #ead2acaf;" animate>
        FILMO FILMO FILMO FILMO FILMO FILMO FILMO FILMO
    </div>  -->
    <!-- </template> -->

<!--
    <script>
        let typeSplit = new SplitType('[animate]', {
            types: 'lines, words, chars',
            tagName: 'span'
        });

        gsap.fromTo('[animate]:nth-child(odd) .line',
            { x: -1800, opacity: 0 },
            { x: 0, opacity: 1, duration: 2.2, ease: 'power2.out', stagger: 0.02,
                scrollTrigger: {
                    trigger: '[animate]:nth-child(odd)',
                    start: 'top 80%',
                    end: 'bottom 50%',
                    scrub: true, // Movimiento suave con el scroll
                }
            }
        );

        gsap.fromTo('[animate]:nth-child(even) .line',
            { x: 1800, opacity: 0 },
            { x: 0, opacity: 1, duration: 3, ease: 'power2.out', stagger: 0.02,
                scrollTrigger: {
                    trigger: '[animate]:nth-child(even)',
                    start: 'top 90%',
                    end: 'bottom 60%',
                    scrub: true, // Más lento
                }
            }
        );
    </script>

  <style>
        .template-scroll {
            background-color: #1F1E24;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            height: 300vh;
            width: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 100px;
        }

        .container-scroll {
            font-size: 6rem;
            font-weight: 800;
            color: rgba(255, 255, 255, 0.548);
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
        }
    </style> -->
