import React from 'react';
import { ArrowRight, Camera, Mail, Play, UsersRound } from 'lucide-react';

const serviceLinks = ['Contact us', 'Delivery information', 'Returns & exchanges', 'FAQs', 'Track your order'];
const aboutLinks = ['Our story', 'Careers', 'Store locator', 'Terms & conditions', 'Privacy policy'];

function LinkColumn({ title, links }) {
    return (
        <div>
            <h3 className="mb-5 text-[10px] font-bold uppercase tracking-[0.15em] text-white">{title}</h3>
            <ul className="space-y-3">
                {links.map((link) => <li key={link}><a href="#" className="text-xs text-zinc-400 transition hover:text-white">{link}</a></li>)}
            </ul>
        </div>
    );
}

export default function Footer() {
    return (
        <footer className="bg-zinc-950 text-white">
            <div className="mx-auto grid max-w-[1600px] grid-cols-1 gap-10 px-5 py-14 sm:grid-cols-2 sm:px-8 lg:grid-cols-[1.3fr_1fr_1fr_1.3fr] lg:gap-12 lg:px-12 lg:py-16">
                <div>
                    <a href="/" className="text-3xl font-black tracking-[-0.1em]">ZANDO<span className="text-rose-500">.</span></a>
                    <p className="mt-4 max-w-xs text-xs leading-6 text-zinc-400">Style for all the ways you show up. Discover fashion, beauty and everyday essentials made for you.</p>
                    <div className="mt-6 flex gap-4">
                        <a href="#" aria-label="Instagram" className="text-zinc-400 transition hover:text-white"><Camera size={18} /></a>
                        <a href="#" aria-label="Facebook" className="text-zinc-400 transition hover:text-white"><UsersRound size={18} /></a>
                        <a href="#" aria-label="YouTube" className="text-zinc-400 transition hover:text-white"><Play size={18} /></a>
                    </div>
                </div>

                <LinkColumn title="Customer service" links={serviceLinks} />
                <LinkColumn title="About ZANDO" links={aboutLinks} />

                <div>
                    <h3 className="mb-5 text-[10px] font-bold uppercase tracking-[0.15em] text-white">The latest, first</h3>
                    <p className="mb-4 text-xs leading-5 text-zinc-400">Get new arrivals, style edits and special offers in your inbox.</p>
                    <form onSubmit={(event) => event.preventDefault()} className="flex border-b border-zinc-600 pb-2">
                        <label className="flex flex-1 items-center gap-2 text-zinc-400"><Mail size={15} /><input type="email" required placeholder="Your email address" className="w-full border-0 bg-transparent p-0 text-xs text-white placeholder:text-zinc-500 focus:ring-0" /></label>
                        <button aria-label="Subscribe" className="text-white transition hover:text-rose-500"><ArrowRight size={18} /></button>
                    </form>
                    <div className="mt-7">
                        <h4 className="mb-3 text-[9px] font-bold uppercase tracking-[0.14em] text-zinc-300">We accept</h4>
                        <div className="flex flex-wrap items-center gap-2">
                            {['visa.svg', 'amex.svg', 'paypal.svg', 'gpay.svg', 'maestro.svg'].map((method) => <span key={method} className="flex h-7 min-w-10 items-center justify-center rounded bg-white px-1.5"><img src={`/img/payment/${method}`} alt={method.replace('.svg', '')} className="max-h-4 max-w-9" /></span>)}
                        </div>
                    </div>
                </div>
            </div>
            <div className="border-t border-white/10">
                <div className="mx-auto flex max-w-[1600px] flex-col gap-2 px-5 py-5 text-[10px] text-zinc-500 sm:flex-row sm:items-center sm:justify-between sm:px-8 lg:px-12">
                    <span>© {new Date().getFullYear()} ZANDO Cambodia. All rights reserved.</span>
                    <span>Made for your everyday.</span>
                </div>
            </div>
        </footer>
    );
}
