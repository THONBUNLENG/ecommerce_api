import React from 'react';
import { ArrowUpRight } from 'lucide-react';
import { categories } from '../data';

export default function CategoryShowcase() {
    return (
        <section id="categories" className="mx-auto max-w-[1600px] px-4 py-16 sm:px-8 sm:py-20 lg:px-12 lg:py-24">
            <div className="mb-8 flex items-end justify-between gap-4 sm:mb-10">
                <div>
                    <p className="mb-2 text-[10px] font-semibold uppercase tracking-[0.2em] text-rose-600">Find your fit</p>
                    <h2 className="text-3xl font-semibold tracking-[-0.045em] sm:text-4xl">Shop by category</h2>
                </div>
                <a href="#featured" className="hidden items-center gap-2 pb-1 text-xs font-semibold uppercase tracking-[0.1em] sm:flex">View all <ArrowUpRight size={15} /></a>
            </div>
            <div className="grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-5">
                {categories.map((category, index) => (
                    <a key={category.name} href={index === 0 ? '/kh/en-gb/women' : '#featured'} className="group relative isolate min-h-[360px] overflow-hidden bg-zinc-100 sm:min-h-[430px]">
                        <img src={category.image} alt={`${category.name} collection`} loading="lazy" className="absolute inset-0 -z-20 h-full w-full object-cover transition duration-700 group-hover:scale-[1.04]" style={{ objectPosition: category.position }} />
                        <div className="absolute inset-0 -z-10 bg-gradient-to-t from-black/60 via-black/5 to-transparent" />
                        <div className="absolute inset-x-0 bottom-0 flex items-end justify-between p-5 text-white sm:p-7">
                            <div>
                                <p className="mb-2 text-[10px] uppercase tracking-[0.17em] text-white/80">{category.note}</p>
                                <h3 className="text-3xl font-medium tracking-[-0.04em]">{category.name}</h3>
                            </div>
                            <span className="grid h-10 w-10 place-items-center rounded-full border border-white/70 transition group-hover:bg-white group-hover:text-zinc-900"><ArrowUpRight size={18} /></span>
                        </div>
                    </a>
                ))}
            </div>
        </section>
    );
}
