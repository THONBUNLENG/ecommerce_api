import React, { useEffect, useState } from 'react';
import { ArrowLeft, ArrowRight, ArrowUpRight } from 'lucide-react';
import { slides } from '../data';

export default function HeroCarousel() {
    const [active, setActive] = useState(0);
    const slide = slides[active];
    const show = (index) => setActive((index + slides.length) % slides.length);

    useEffect(() => {
        const timer = window.setInterval(() => setActive((index) => (index + 1) % slides.length), 6500);
        return () => window.clearInterval(timer);
    }, []);

    return (
        <section className="relative isolate min-h-[490px] overflow-hidden bg-zinc-900 sm:min-h-[580px] lg:min-h-[650px]" aria-label="Featured collection">
            <img key={slide.image} src={slide.image} alt="New season fashion collection" className="absolute inset-0 -z-20 h-full w-full object-cover transition-opacity duration-700" style={{ objectPosition: slide.position }} />
            <div className="absolute inset-0 -z-10 bg-gradient-to-r from-black/65 via-black/30 to-black/5" />
            <div className="mx-auto flex min-h-[490px] max-w-[1600px] items-center px-6 py-16 sm:min-h-[580px] sm:px-12 lg:min-h-[650px] lg:px-20">
                <div className="max-w-xl text-white">
                    <p className="mb-5 text-[10px] font-semibold uppercase tracking-[0.25em] text-white/80 sm:text-xs">{slide.eyebrow}</p>
                    <h1 className="whitespace-pre-line text-5xl font-semibold leading-[0.98] tracking-[-0.055em] sm:text-6xl lg:text-7xl">{slide.title}</h1>
                    <p className="mt-6 max-w-md text-sm leading-6 text-white/85 sm:text-base">{slide.description}</p>
                    <a href="#featured" className="mt-8 inline-flex items-center gap-4 bg-white px-5 py-4 text-[10px] font-bold uppercase tracking-[0.13em] text-zinc-900 transition hover:bg-rose-600 hover:text-white sm:px-7">
                        {slide.action}<ArrowUpRight size={16} />
                    </a>
                </div>
            </div>
            <div className="absolute bottom-6 right-5 flex items-center gap-3 sm:bottom-8 sm:right-10">
                <span className="mr-2 text-[10px] tracking-[0.15em] text-white">0{active + 1} <span className="text-white/50">/ 0{slides.length}</span></span>
                <button onClick={() => show(active - 1)} aria-label="Previous slide" className="grid h-10 w-10 place-items-center border border-white/60 text-white transition hover:bg-white hover:text-zinc-900"><ArrowLeft size={17} /></button>
                <button onClick={() => show(active + 1)} aria-label="Next slide" className="grid h-10 w-10 place-items-center border border-white/60 text-white transition hover:bg-white hover:text-zinc-900"><ArrowRight size={17} /></button>
            </div>
            <div className="absolute bottom-0 left-0 right-0 flex h-[3px] gap-1 px-5 sm:px-10">
                {slides.map((item, index) => <button key={item.eyebrow} onClick={() => show(index)} aria-label={`Show slide ${index + 1}`} className={`h-full flex-1 ${index === active ? 'bg-white' : 'bg-white/35'}`} />)}
            </div>
        </section>
    );
}
